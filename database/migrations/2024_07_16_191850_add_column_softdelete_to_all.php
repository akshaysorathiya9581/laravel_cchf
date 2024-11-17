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
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_coupon', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_custom_code', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_email_template', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_gallery', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_gifts', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_media', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_menu', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_meta', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_og_settings', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_payment_method', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_split_the_pot', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_sponsorship_opportunities', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_teams', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('campaign_users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('coupons', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('donations', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('donation_split_the_pot', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('early_bird', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('grand_prizes', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('organization', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('organization_meta', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('prizes', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('seasons', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('ticket_options', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('ticket_options_prizes', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('transaction_detail', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_coupon', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_custom_code', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_email_template', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_gallery', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_gifts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_media', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_menu', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_meta', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_og_settings', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_payment_method', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_split_the_pot', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_sponsorship_opportunities', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_teams', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('campaign_users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('donations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('donation_split_the_pot', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('early_bird', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('grand_prizes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('organization', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('organization_meta', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('prizes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('seasons', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('ticket_options', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('ticket_options_prizes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('transaction_detail', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
