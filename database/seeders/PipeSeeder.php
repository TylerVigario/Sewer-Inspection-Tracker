<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pipes')->insert([[
            'upstream_asset_id' => 19,
            'downstream_asset_id' => 1
        ],[
            'upstream_asset_id' => 1,
            'downstream_asset_id' => 2
        ],[
            'upstream_asset_id' => 2,
            'downstream_asset_id' => 18
        ],[
            'upstream_asset_id' => 21,
            'downstream_asset_id' => 2
        ],[
            'upstream_asset_id' => 5,
            'downstream_asset_id' => 3
        ],[
            'upstream_asset_id' => 4,
            'downstream_asset_id' => 5
        ],[
            'upstream_asset_id' => 22,
            'downstream_asset_id' => 5
        ],[
            'upstream_asset_id' => 3,
            'downstream_asset_id' => 6
        ],[
            'upstream_asset_id' => 6,
            'downstream_asset_id' => 7
        ],[
            'upstream_asset_id' => 23,
            'downstream_asset_id' => 9
        ],[
            'upstream_asset_id' => 20,
            'downstream_asset_id' => 7
        ],[
            'upstream_asset_id' => 7,
            'downstream_asset_id' => 9
        ],[
            'upstream_asset_id' => 9,
            'downstream_asset_id' => 10
        ],[
            'upstream_asset_id' => 10,
            'downstream_asset_id' => 11
        ],[
            'upstream_asset_id' => 16,
            'downstream_asset_id' => 10
        ],[
            'upstream_asset_id' => 11,
            'downstream_asset_id' => 13
        ],[
            'upstream_asset_id' => 13,
            'downstream_asset_id' => 17
        ],[
            'upstream_asset_id' => 24,
            'downstream_asset_id' => 12
        ],[
            'upstream_asset_id' => 15,
            'downstream_asset_id' => 12
        ],[
            'upstream_asset_id' => 12,
            'downstream_asset_id' => 14
        ]]);

        $data = [];

        for ($i = 1; $i <= 20; $i++)
        {
            $data[] = [
                'pipe_id' => $i,
                'project_id' => 1
            ];
        }

        DB::table('pipe_project')->insert($data);
    }
}
