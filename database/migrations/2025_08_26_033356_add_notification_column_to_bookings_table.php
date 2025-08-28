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
            $table->tinyInteger('notification_user')->default(1)->comment('0 = Unread, 1 = Read')->after('status');
            $table->tinyInteger('notification_admin')->default(1)->comment('0 = Unread, 1 = Read')->after('notification_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['notification_user', 'notification_admin']);
        });
    }
};
