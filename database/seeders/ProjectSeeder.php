<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([[
            'project_type_id' => 2,
            'customer_id' => 1,
            'name' => '35509372-T5SF-30615',
            'due' => Carbon::parse('12/01/2024'),
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ],[
            'project_type_id' => 2,
            'customer_id' => 1,
            'name' => '35315620-R9R0-30087',
            'due' => Carbon::parse('11/01/2024'),
            'lat' => 37.293757,
            'lng' => -120.518860,
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ]]);
    }
}
