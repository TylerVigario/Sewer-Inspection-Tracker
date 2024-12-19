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
            'lat' => 35.365531,
            'lng' => -119.010117,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 2
            'name' => '721',
            'lat' => 35.364581,
            'lng' => -119.010099,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 3
            'name' => '713',
            'lat' => 35.364581247554774,
            'lng' => -119.00952250201577,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 4
            'name' => '700',
            'lat' => 35.365530221212104,
            'lng' => -119.00894589481281,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 5
            'name' => '617',
            'lat' => 35.364588087044666,
            'lng' => -119.00895218506659,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 6
            'name' => '701',
            'lat' => 35.363633972620924,
            'lng' => -119.00953717926612,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 7
            'name' => '600',
            'lat' => 35.362674070258606,
            'lng' => -119.00952916212223,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 8
            'name' => '631',
            'lat' => 35.36214399551747,
            'lng' => -119.00953545237948,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 9
            'name' => '728',
            'lat' => 35.362685453810215,
            'lng' => -119.0106857077806,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 10
            'name' => '830',
            'lat' => 35.36268533120604,
            'lng' => -119.0118346353741,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 11
            'name' => '900',
            'lat' => 35.36268362129338,
            'lng' => -119.0118597964138,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 12
            'name' => '931',
            'lat' => 35.36268139431815,
            'lng' => -119.01307912952477,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $mh,     // 13
            'name' => '511',
            'lat' => 35.36214849853051,
            'lng' => -119.01185382488099,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 14
            'name' => '931',
            'lat' => 35.36268475850083,
            'lng' => -119.01318176693816,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 15
            'name' => '930',
            'lat' => 35.36282839103531,
            'lng' => -119.01306854225945,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 16
            'name' => '610',
            'lat' => 35.36308285854067,
            'lng' => -119.01184204493927,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 17
            'name' => '501',
            'lat' => 35.361732813944215,
            'lng' => -119.01185605352393,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 18
            'name' => '727',
            'lat' => 35.36458540687897,
            'lng' => -119.0107380581761,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ewz,    // 19
            'name' => '916',
            'lat' => 35.365991852842775,
            'lng' => -119.01012448827393,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $co,     // 20
            'name' => '603',
            'lat' => 35.36267618490771,
            'lng' => -119.00854182154434,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $cap,    // 21
            'name' => '713',
            'lat' => 35.364562282656316,
            'lng' => -119.00960732144969,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $cap,    // 22
            'name' => '605',
            'lat' => 35.36455043307022,
            'lng' => -119.00848812065996,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $ep,     // 23
            'name' => '624',
            'lat' => 35.36328243180064,
            'lng' => -119.01068170315669,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'asset_type_id' => $cap,    // 24
            'name' => '901',
            'lat' => 35.36266673686187,
            'lng' => -119.01191004756302,
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
