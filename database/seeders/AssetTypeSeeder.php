<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asset_types')->insert([[
            'name' => 'Manhole',              // 1
            'tag' => 'MH',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Cleanout',             // 2
            'tag'=> 'CO',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Roof Vent',            // 3
            'tag'=> 'RV',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Tap',                  // 4
            'tag'=> 'T',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Branch',               // 5
            'tag'=> 'B',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Catch Basin',          // 6
            'tag'=> 'CB',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Storm Drain Manhole',  // 7
            'tag'=> 'SDMH',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'End of Workzone',      // 8
            'tag'=> 'EWZ',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Cap',                  // 9
            'tag'=> 'CAP',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'End of Pipe',          // 10
            'tag'=> 'EP',
            'created_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Building',          // 11
            'tag'=> 'BLDG',
            'created_at' => Carbon::parse('12/24/2024 1:30AM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/24/2024 1:30AM', 'America/Los_Angeles')->tz('UTC'),
        ]]);
    }
}
