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
        Schema::create('campaign_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->text('description')->nullable();
            $table->string('goal')->nullable()->default(0);
            $table->integer('is_extented')->nullable()->default(0);
            $table->dateTime('extend_date')->nullable();
            $table->integer('is_match')->nullable()->default(0);
            $table->double('match_cap')->nullable();
            $table->integer('match_by')->nullable();
            $table->string('menuPosition')->nullable()->default('floating');
            $table->integer('show_goal')->nullable()->default(0);
            $table->string('total_amount_currency')->default('usd');
            $table->integer('bonus_goal')->nullable()->default(0);
            $table->integer('bonus_amount')->nullable();
            $table->integer('enable_gifts')->nullable()->default(0);
            $table->integer('show_donors')->default(1);
            $table->string('donation_title')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('show_end_date')->nullable()->default(0);
            $table->integer('show_team_button')->nullable()->default(0);
            $table->integer('count_down')->nullable();
            $table->integer('show_recent_donations')->nullable()->default(1);
            $table->tinyInteger('multi_currency')->nullable()->default(0);
            $table->integer('tickets')->nullable()->nullable();
            $table->integer('price')->nullable()->nullable();
            $table->tinyInteger('future_donation')->nullable()->default(0);
            $table->tinyInteger('manual_amount')->nullable()->default(0);
            $table->tinyInteger('is_recurring')->nullable()->default(0);
            $table->integer('recurring_cycles')->nullable();
            $table->tinyInteger('allow_fee')->nullable()->default(0);
            $table->double('fee_percentage')->default(0);
            $table->integer('early_bird')->nullable();
            $table->integer('intro_content_enabled')->nullable()->default(0);
            $table->longText('intro_content_header')->nullable();
            $table->longText('intro_main_content')->nullable();
            $table->longText('additional_content')->nullable();
            $table->longText('button_content')->nullable();
            $table->timestamps();


            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_meta');
    }
};
