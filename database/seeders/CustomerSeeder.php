<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'name' => 'PG&E',
            'email' => 'pge@test.com',
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('1/1/2025 3:00PM')
        ]);
    }
}
