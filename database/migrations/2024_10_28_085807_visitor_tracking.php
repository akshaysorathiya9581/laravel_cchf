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
        Schema::create('visitor_tracking', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_id', 255);
            $table->integer('cc_id')->default(0);
            $table->integer('campaing_id')->default(0);
            $table->string('ref_name', 255)->nullable();
            $table->string('ip', 255);
            $table->string('page_link', 255);
            $table->string('ref_link', 255)->nullable();
            $table->string('query_string', 255)->nullable();
            $table->text('user_agent');
            $table->string('browser', 100)->nullable();
            $table->string('os', 100)->nullable();
            $table->string('device', 100)->nullable();
            $table->string('status', 20)->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_tracking');
    }
};
