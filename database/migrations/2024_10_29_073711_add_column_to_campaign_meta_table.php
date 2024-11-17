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
            $table->longText('main_content_yiddish')->nullable();
            $table->longText('yingerman_content_yiddish')->nullable();
            $table->longText('yingerman_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaign_meta', function (Blueprint $table) {
            $table->dropColumn('main_content_yiddish');
            $table->dropColumn('yingerman_content_yiddish');
            $table->dropColumn('yingerman_content');
        });
    }
};