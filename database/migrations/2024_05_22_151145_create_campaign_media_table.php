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
        Schema::create('campaign_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->integer('theme_id')->nullable();
            $table->string('logo_type')->nullable()->default('logo');
            $table->string('logo_url')->nullable();
            $table->string('logo_mobile_url')->nullable();
            $table->string('logo_content')->nullable();
            $table->string('logo_mobile_content')->nullable();
            $table->timestamps();


            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_media');
    }
};
