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
        Schema::table('campaign_email_template', function (Blueprint $table) {
            $table->longText('before_donation_details')->nullable()->change();
            $table->longText('after_donation_details')->nullable()->change();
        });
        Schema::table('campaign_custom_code', function (Blueprint $table) {
            $table->longText('content')->nullable()->change();
        });
        Schema::table('campaign_gallery', function (Blueprint $table) {
            $table->longText('embed')->nullable()->change();
        });
        Schema::table('campaign_gifts', function (Blueprint $table) {
            $table->longText('details')->nullable()->change();
        });
        Schema::table('campaign_og_settings', function (Blueprint $table) {
            $table->longText('og_description')->nullable()->change();
        });
        Schema::table('campaign_payment_method', function (Blueprint $table) {
            $table->text('api_key')->nullable()->change();
            $table->text('public_key')->nullable()->change();
            $table->text('pin')->nullable()->change();
        });
        Schema::table('organization_meta', function (Blueprint $table) {
            $table->longText('statement_descriptor')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaign_email_template', function (Blueprint $table) {
            $table->string('before_donation_details', 255)->nullable()->change();
            $table->string('after_donation_details', 255)->nullable()->change();
        });
        Schema::table('campaign_custom_code', function (Blueprint $table) {
            $table->string('content', 255)->nullable()->change();
        });
        Schema::table('campaign_gallery', function (Blueprint $table) {
            $table->string('embed', 255)->nullable()->change();
        });
        Schema::table('campaign_gifts', function (Blueprint $table) {
            $table->string('details', 255)->nullable()->change();
        });
        Schema::table('campaign_og_settings', function (Blueprint $table) {
            $table->string('og_description', 255)->nullable()->change();
        });
        Schema::table('campaign_payment_method', function (Blueprint $table) {
            $table->string('api_key', 255)->nullable()->change();
            $table->string('public_key', 255)->nullable()->change();
            $table->string('pin', 255)->nullable()->change();
        });
        Schema::table('organization_meta', function (Blueprint $table) {
            $table->string('statement_descriptor', 255)->nullable()->change();
        });
    }
};
