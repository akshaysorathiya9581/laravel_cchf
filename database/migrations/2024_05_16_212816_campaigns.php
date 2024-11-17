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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('season_id'); //
            $table->string('cause_type')->nullable()->default('raffle');
            $table->string('org_name')->nullable();
            $table->string('template')->nullable();
            $table->string('slug');
            $table->string('camp_title');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('season_id')->references('id')->on('seasons')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
