<?php

namespace Database\Seeders;

use App\Models\Plaatje;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlaatjesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2500; $i++) {
            Plaatje::firstOrCreate(
                ['id' => $i],
                [
                    'datum' => now(),
                    'titel' => 'titel'.$i,
                    'omschrijving' => 'test',
                    'url' => 'test',
                    'width' => '0',
                    'height' => '0',
                ]);
        }
    }
}
