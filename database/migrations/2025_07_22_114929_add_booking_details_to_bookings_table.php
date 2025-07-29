<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('chairman')->after('meeting_name');
            $table->date('start_date')->after('chairman');
            $table->date('end_date')->after('start_date');
            $table->time('start_time')->after('end_date');
            $table->time('end_time')->after('start_time');
            $table->string('number_of_participants')->after('end_time');
            $table->text('description')->after('number_of_participants');
            $table->unsignedBigInteger('room_id')->after('description');
            $table->string('type')->after('room_id');
            $table->tinyInteger('status')->default(1)->after('type')
                  ->comment('1 = New, 2 = Pending, 3 = Approved, 4 = Rejected, 5 = Cancelled by User, 6 = Updated by User, 7 = Confirmed by User');
            $table->string('repetition_type')->nullable()->after('status');
            $table->date('repeat_date')->nullable()->after('repetition_type');
            $table->string('room_plan')->after('repeat_date');

            // Secretariat Information
            $table->string('secretariat_name')->after('room_plan');
            $table->string('secretariat_office_phone')->nullable()->after('secretariat_name');
            $table->string('secretariat_mobile_phone')->after('secretariat_office_phone');
            $table->string('secretariat_email')->after('secretariat_mobile_phone');

            // Other Bookings
            $table->boolean('food')->default(false)->after('secretariat_email');
            $table->string('catering_name')->nullable()->after('food');
            $table->string('catering_phone')->nullable()->after('catering_name');

            $table->boolean('technical_services')->default(false)->after('catering_phone');
            $table->boolean('ict_services')->default(false)->after('technical_services');

            // Equipment (JSON Array)
            $table->json('equipment')->nullable()->after('ict_services');

            // Other Requirements
            $table->boolean('other_requirements')->default(false)->after('equipment');
            $table->string('car_number')->nullable()->after('other_requirements');
            $table->string('update_info')->nullable()->after('car_number');
            $table->string('reviews')->nullable()->after('update_info');

            // Foreign Keys
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};
