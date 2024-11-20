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
        // Check if the 'publish_date' column already exists
        if (!Schema::hasColumn('blogs', 'publish_date')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->date('publish_date')->nullable()->after('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if the column exists before dropping it
        if (Schema::hasColumn('blogs', 'publish_date')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropColumn('publish_date');
            });
        }
    }
};
