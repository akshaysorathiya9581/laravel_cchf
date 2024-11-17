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
        Schema::create('organization_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->string('email')->nullable();
            $table->string('legal_name')->nullable();
            $table->string('bank_statement')->nullable();
            $table->string('org_phone')->nullable();
            $table->string('org_address')->nullable();
            $table->string('org_address_2')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('statement_descriptor')->nullable();
            $table->string('twilio_phone_number')->nullable();
            $table->string('forward_to_number')->nullable();
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_meta');
    }
};
