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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('campaign_id');
            $table->tinyInteger('is_updates_news')->length(1)->default(0);
            $table->tinyInteger('is_new_course')->length(1)->default(0);
            $table->tinyInteger('is_new_parsha_lecture')->length(1)->default(0);
            $table->tinyInteger('is_invitation_customer')->length(1)->default(0);
            $table->tinyInteger('is_request_rate_review')->length(1)->default(0);
            $table->tinyInteger('is_reminders_progress_courses')->length(1)->default(0);
            $table->tinyInteger('is_like_comment')->length(1)->default(0);
            $table->tinyInteger('is_top_trending_courses')->length(1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
