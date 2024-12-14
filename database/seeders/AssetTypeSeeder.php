<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asset_types')->insert([[
            'name' => 'Manhole',              // 1
            'tag' => 'MH'
        ],[
            'name' => 'Cleanout',             // 2
            'tag'=> 'CO'
        ],[
            'name' => 'Roof Vent',            // 3
            'tag'=> 'RV'
        ],[
            'name' => 'Tap',                  // 4
            'tag'=> 'T'
        ],[
            'name' => 'Branch',               // 5
            'tag'=> 'B'
        ],[
            'name' => 'Catch Basin',          // 6
            'tag'=> 'CB'
        ],[
            'name' => 'Storm Drain Manhole',  // 7
            'tag'=> 'SDMH'
        ],[
            'name' => 'End of Workzone',      // 8
            'tag'=> 'EWZ'
        ],[
            'name' => 'Cap',                  // 9
            'tag'=> 'CAP'
        ],[
            'name' => 'End of Pipe',          // 10
            'tag'=> 'EP'
        ]]);
    }
}
