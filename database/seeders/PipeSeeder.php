<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pipes')->insert([[
            'upstream_asset_id' => 19,
            'downstream_asset_id' => 1,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 1,
            'downstream_asset_id' => 2,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 2,
            'downstream_asset_id' => 18,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 21,
            'downstream_asset_id' => 2,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 5,
            'downstream_asset_id' => 3,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 4,
            'downstream_asset_id' => 5,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 22,
            'downstream_asset_id' => 5,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 3,
            'downstream_asset_id' => 6,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 6,
            'downstream_asset_id' => 7,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 23,
            'downstream_asset_id' => 9,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 20,
            'downstream_asset_id' => 7,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 7,
            'downstream_asset_id' => 9,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 9,
            'downstream_asset_id' => 10,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 10,
            'downstream_asset_id' => 11,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 16,
            'downstream_asset_id' => 10,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 11,
            'downstream_asset_id' => 13,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 13,
            'downstream_asset_id' => 17,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 24,
            'downstream_asset_id' => 12,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 15,
            'downstream_asset_id' => 12,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'upstream_asset_id' => 12,
            'downstream_asset_id' => 14,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ]]);

        $data = [];

        for ($i = 1; $i <= 20; $i++)
        {
            $data[] = [
                'pipe_id' => $i,
                'project_id' => 1
            ];
        }

        DB::table('project_pipes')->insert($data);
    }
}
