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
        DB::table('projects')->insert([
            'customer_id' => 1,
            'name' => '35509372-T5SF-30615',
            'due' => Carbon::parse('12/01/2024'),
            'lat' => 35.365926,
            'lng' => -119.010390,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
