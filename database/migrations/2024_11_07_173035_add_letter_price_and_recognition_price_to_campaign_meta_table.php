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
            $table->double('letter_price', 9, 2)->nullable();
            $table->double('recognition_price', 9, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaign_meta', function (Blueprint $table) {
            $table->dropColumn('letter_price');
            $table->dropColumn('recognition_price');
        });
    }
};
