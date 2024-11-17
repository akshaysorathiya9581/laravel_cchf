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
        Schema::create('ticket_options', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id')->default(0);
            // $table->unsignedBigInteger('season_id');
            $table->string('title');
            $table->integer('price');
            $table->integer('entries');
            $table->integer('coupon_id')->nullable();
            $table->integer('grand_prize')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('order_by')->nullable();
            $table->text('content')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
            // $table->foreign('season_id')->references('id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_options');
    }
};
