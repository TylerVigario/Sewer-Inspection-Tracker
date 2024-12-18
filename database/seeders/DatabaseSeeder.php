<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AssetTypeSeeder::class,
            CustomerSeeder::class,
            ProjectTypeSeeder::class,
            ProjectSeeder::class,
            AssetSeeder::class,
            PipeSeeder::class
        ]);
    }
}
