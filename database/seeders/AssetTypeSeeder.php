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
        DB::table('asset_types')->insert([
            'name' => 'Manhole',
            'tag' => 'MH'
        ],[
            'name' => 'Cleanout',
            'tag'=> 'CO'
        ],[
            'name' => 'Roof Vent',
            'tag'=> 'RV'
        ],[
            'name' => 'Tap',
            'tag'=> 'T'
        ],[
            'name' => 'Branch',
            'tag'=> 'B'
        ],[
            'name' => 'Catch Basin',
            'tag'=> 'CB'
        ]);
    }
}