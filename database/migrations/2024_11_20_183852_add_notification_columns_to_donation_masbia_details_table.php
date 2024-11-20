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
        Schema::table('donation_masbia_details', function (Blueprint $table) {
            $table->boolean('is_notification')->after('is_letter')->default(false);
            $table->string('notification_mail')->after('is_notification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donation_masbia_details', function (Blueprint $table) {
            $table->dropColumn(['is_notification', 'notification_mail']);
        });
    }
};
