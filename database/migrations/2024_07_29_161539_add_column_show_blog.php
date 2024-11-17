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
        Schema::table('campaign_meta', function (Blueprint $table) {
            $table->integer('enable_blogs')->nullable()->default(0);
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaign_meta', function (Blueprint $table) {
            $table->dropColumn('enable_blogs');
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('campaign_id');
        });
    }
};
