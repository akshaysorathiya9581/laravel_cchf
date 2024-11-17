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
        //

        Schema::create('refund_donations', function (Blueprint $table) {
            $table->id();
            $table->integer('doid');
            $table->string('refund_message');
            $table->string('refund_status');
            $table->string('refund_id');
            $table->string('refund_amount');
            $table->string('schedule_message');
            $table->string('notes');
            $table->string('refund_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('refund_donations');
    }
};
