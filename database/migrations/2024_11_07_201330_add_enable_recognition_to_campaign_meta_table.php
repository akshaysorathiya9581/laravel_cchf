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
            $table->tinyInteger('enable_recognition')->length(1)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaign_meta', function (Blueprint $table) {
            $table->dropColumn('enable_recognition');
        });
    }
};
