<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_types')->insert([[
            'name' => 'New Construction',
            'created_at' => Carbon::parse('12/17/2024 11:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/17/2024 11:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Crossbore Prevention',
            'created_at' => Carbon::parse('12/17/2024 11:30PM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/17/2024 11:30PM', 'America/Los_Angeles')->tz('UTC'),
        ],[
            'name' => 'Existing Infrastructure',
            'created_at' => Carbon::parse('12/18/2024 8AM', 'America/Los_Angeles')->tz('UTC'),
            'updated_at' => Carbon::parse('12/18/2024 8AM', 'America/Los_Angeles')->tz('UTC'),
        ]]);
    }
}
