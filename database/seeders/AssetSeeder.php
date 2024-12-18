<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mh = 1;
        $co = 2;
        $rv = 3;
        $t = 4;
        $b = 5;
        $cb = 6;
        $sdmh = 7;
        $ewz = 8;
        $cap = 9;
        $ep = 10;

        DB::table('assets')->insert([[  // 1
            'asset_type_id' => $mh,
            'name' => '717',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 2
            'name' => '721',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 3
            'name' => '713',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 4
            'name' => '700',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 5
            'name' => '617',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 6
            'name' => '701',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 7
            'name' => '600',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 8
            'name' => '631',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 9
            'name' => '728',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 10
            'name' => '830',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 11
            'name' => '900',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 12
            'name' => '931',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 13
            'name' => '511',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 14
            'name' => '931',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 15
            'name' => '930',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 16
            'name' => '610',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 17
            'name' => '501',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 18
            'name' => '727',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 19
            'name' => '916',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $co,     // 20
            'name' => '603',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $cap,    // 21
            'name' => '713',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $cap,    // 22
            'name' => '605',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ep,     // 23
            'name' => '624',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $cap,    // 24
            'name' => '901',
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ]]);

        $data = [];

        for ($i = 1; $i <= 24; $i++)
        {
            $data[] = [
                'asset_id' => $i,
                'project_id' => 1
            ];
        }

        DB::table('project_assets')->insert($data);
    }
}
