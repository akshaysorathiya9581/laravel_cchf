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
        Schema::create('grand_prizes', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('season_id');
            $table->string('title')->nullable();
            $table->float('amount', precision: 53)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            // $table->foreign('season_id')->references('id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grand_prizes');
    }
};
