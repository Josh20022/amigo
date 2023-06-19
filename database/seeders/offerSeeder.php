<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OfferCategory;
use App\Models\Offer;

class offerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Maak het testaanbieding (offer) aan
        $offer = Offer::create([
            'datum' => now(),
            'titel' => 'Test Offer',
            'pl' => 0,
            'volgorde' => 1,
            'url' => 'example.com',
            'omschrijving' => 'Dit is een testaanbieding.',
            'metatitel' => 'Test Offer',
            'metadesc' => 'Dit is een testaanbieding',
            'metakeys' => 'test, aanbieding',
            'hoofdcat' => null,
        ]);

        // Maak offerCategories aan voor elk ID dat nog niet bestaat tot 67
        for ($i = 1; $i <= 80; $i++) {
            OfferCategory::firstOrCreate(
                ['id' => $i],
                [
                    'datum' => now(),
                    'titel' => 'Offer Category ' . $i,
                    'pl' => 0,
                    'volgorde' => $i,
                    'url' => 'example.com/category-' . $i,
                    'omschrijving' => 'Dit is een testaanbiedingscategorie ' . $i,
                    'metatitel' => 'Offer Category ' . $i,
                    'metadesc' => 'Dit is een testaanbiedingscategorie',
                    'metakeys' => 'test, categorie',
                    'hoofdcat' => $offer->id,
                ]
            );
        }
    }
}
