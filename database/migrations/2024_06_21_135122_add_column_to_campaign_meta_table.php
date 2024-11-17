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
                $table->string('rules_description')->nullable();
                $table->integer('enable_stats')->nullable()->default(0);
                $table->integer('enable_fabulous_prizes')->nullable()->default(0);
                $table->integer('enable_total_donors')->nullable()->default(0);
                $table->integer('enable_ticket_sold')->nullable()->default(0);
                $table->integer('enable_largest_donation')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaign_meta', function (Blueprint $table) {
            $table->dropColumn('rules_description');
            $table->dropColumn('enable_stats');
            $table->dropColumn('enable_fabulous_prizes');
            $table->dropColumn('enable_total_donors');
            $table->dropColumn('enable_ticket_sold');
            $table->dropColumn('enable_largest_donation');
        });
    }
};
