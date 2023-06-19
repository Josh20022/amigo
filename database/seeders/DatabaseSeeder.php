<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AboutPageSeeder;
use Database\Seeders\NewsTableSeeder;
use Database\Seeders\ReferenceTableSeeder;
use Database\Seeders\ContactPageTextSeeder;
use Database\Seeders\HomepageTextsTableSeeder;
use Database\Seeders\HomepageStructureTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            HomepageStructureTableSeeder::class
        ]);
        $this->call([
            NewsTableSeeder::class
        ]);
        $this->call([
            ReferenceTableSeeder::class
        ]);
        $this->call([
            AboutPageSeeder::class
        ]);
        $this->call([
            ContactPageTextSeeder::class
        ]);
    }
}
