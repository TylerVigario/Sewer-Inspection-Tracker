<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Test',
            'email' => 'test@visfresno.com',
            'password' => Hash::make('test'),
            'first_name' => 'Test',
            'last_name' => 'User',
            'created_at' => Carbon::parse('12/13/2024 6:30PM'),
            'updated_at' => Carbon::parse('12/13/2024 6:30PM')
        ]);
    }
}
