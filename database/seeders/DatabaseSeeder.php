<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LocationSeeder::class, // Must run first (users depend on locations)
            UserSeeder::class,
            BranchSeeder::class,   // Must run after users
            BannerSeeder::class,   // Independent — no FK dependencies
        ]);
    }
}
