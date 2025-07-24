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
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('picture')->nullable()->after('room_capacity');
            $table->string('layout')->nullable()->after('picture');
            $table->json('facilities')->nullable()->after('layout');
            $table->tinyInteger('status')->default(1)->comment('0 = Inactive, 1 = Active')->after('facilities');
            $table->string('level')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
        });
    }
};
