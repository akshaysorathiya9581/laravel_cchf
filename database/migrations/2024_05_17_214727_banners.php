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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('campaign_id');
            $table->enum('banner_type', ['file', 'text']);
            $table->string('file_title')->nullable();
            $table->string('file_desktop_image')->nullable();
            $table->string('file_mobile_image')->nullable();
            $table->string('text_main_content')->nullable();
            $table->string('text_sub_content')->nullable();
            $table->string('text_button')->nullable();
            $table->string('text_button_link')->nullable();
            $table->string('text_desktop_image')->nullable();
            $table->string('text_mobile_image')->nullable();
            $table->double('text_amount')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
