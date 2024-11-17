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
        Schema::create('donation_masbia_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donation_id');
            $table->integer('donation_location_id');
            $table->integer('allocate_donation_id');
            $table->longText('dedication_comments')->nullable();
            $table->double('letter_price', 9, 2)->nullable();
            $table->double('recognition_price', 9, 2)->nullable();
            $table->tinyInteger('is_recognition')->length(1)->default(0);
            $table->tinyInteger('is_letter')->length(1)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_masbia_details');
    }
};
