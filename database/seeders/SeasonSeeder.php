<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = [
            ['name' => 'Fall', 'start_date' => '2025-09-22', 'end_date' => '2024-12-21'],
            ['name' => 'Winter', 'start_date' => '2024-12-22', 'end_date' => '2025-03-19'],
        ];

        foreach ($seasons as $season) {
            DB::table('seasons')->insert([
                'name' => $season['name'],
                'start_date' => $season['start_date'],
                'end_date' => $season['end_date'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
