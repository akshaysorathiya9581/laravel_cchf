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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('friendly_key')->nullable();
            // $table->unsignedBigInteger('season_id');
            $table->integer('visitor_id')->nullable();
            $table->unsignedBigInteger('campaign_id');
            $table->integer('ticket_option_id')->nullable();
            $table->integer('team_id')->nullable();
            $table->string('donor_first_name', 255);
            $table->string('donor_last_name', 255);
            $table->string('donor_email', 255);
            $table->string('donor_phone', 255)->nullable();
            $table->integer('is_anonymous')->default(0);
            $table->string('cell_number', 255)->nullable();
            $table->mediumText('full_address')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('zipcode', 100)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('additional_email', 255)->nullable();
            $table->mediumText('comments')->nullable();
            $table->string('in_memory_of', 255)->nullable();
            $table->integer('coupon_id')->default(0);
            $table->string('amount', 255);
            $table->string('fee', 255)->nullable();
            $table->string('usd_amount', 255);
            $table->string('usd_fee', 255)->nullable();
            $table->string('currency', 50);
            $table->string('recurring', 50);
            $table->integer('recurring_intervals')->nullable();
            $table->integer('spt_id')->nullable();
            $table->string('transaction_id', 255)->nullable();
            $table->string('custom_transaction_number', 255)->nullable();
            $table->string('subscription_id', 255)->nullable();
            $table->string('payment_gateway', 50)->default('ck');
            $table->string('status', 100)->default('Paid');
            $table->mediumText('notes')->nullable();
            $table->integer('custom_tickets')->default(0);
            $table->string('paid_by', 10)->nullable();
            $table->integer('entries')->nullable();
            $table->string('sponsor_oppertunity', 255)->nullable();
            $table->string('other_pm_input_1', 1000)->nullable();
            $table->string('other_pm_input_2', 1000)->nullable();
            $table->integer('sf_key')->default(0);
            $table->string('gift_ids', 255)->nullable();
            $table->integer('grand_prize_id')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            // $table->foreign('season_id')->references('id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
