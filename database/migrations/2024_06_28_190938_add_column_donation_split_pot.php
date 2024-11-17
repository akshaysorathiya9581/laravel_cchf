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
        Schema::table('donation_split_the_pot', function (Blueprint $table) {
            $table->string('stp_usd_amount')->nullable();
            $table->string('stp_amount')->nullable();
            $table->string('stp_entries')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donation_split_the_pot', function (Blueprint $table) {
            $table->dropColumn('stp_usd_amount');
            $table->dropColumn('stp_amount');
            $table->dropColumn('stp_entries');
    });
    }
};
