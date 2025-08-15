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
            $table->string('ministry')->nullable()->after('other_layout_plan');
            $table->string('position')->nullable()->after('ministry');
            $table->string('gred')->nullable()->after('position');
            $table->string('office')->nullable()->after('gred');
            $table->string('phone')->nullable()->after('office');
            $table->string('email')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['ministry', 'position', 'gred', 'office', 'phone', 'email']);
        });
    }
};
