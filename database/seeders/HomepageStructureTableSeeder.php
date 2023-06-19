<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomepageStructure;
use App\Models\HomepageText;
use App\Models\HomepageButton;

class HomepageStructureTableSeeder extends Seeder
{
    public function run()
    {
        // Create homepage text records
        $headerText = HomepageText::create([
            'text' => 'Welcome to our website!',
            'section' => 'slider'
        ]);

        $titleText = HomepageText::create([
            'text' => 'Discover our services',
            'section' => 'slider'
        ]);

        $qualityTitle = HomepageText::create([
            'text' => 'Waarom voor ons kiezen?',
            'section' => 'quality'
        ]);

        $quality_1 = HomepageText::create([
            'text' => 'Betrouwbare partner',
            'section' => 'quality'
        ]);

        $quality_2 = HomepageText::create([
            'text' => 'Hoogste kwaliteit',
            'section' => 'quality'
        ]);

        $quality_3 = HomepageText::create([
            'text' => 'Scherpste prijs',
            'section' => 'quality'
        ]);

        $quality_4 = HomepageText::create([
            'text' => 'Breed assortiment',
            'section' => 'quality'
        ]);

        $quality_5 = HomepageText::create([
            'text' => 'Uitstekende service',
            'section' => 'quality'
        ]);

        $reference_title = HomepageText::create([
            'text' => 'Bedrijven waar wij mee hebben samengewerkt.',
            'section' => 'references'
        ]);

        // Create homepage button records
        $button1 = HomepageButton::create([
            'label' => 'Learn more',
            'url' => 'https://www.example.com'
        ]);

        $button2 = HomepageButton::create([
            'label' => 'Contact us',
            'url' => 'https://www.example.com/contact'
        ]);

        // Create homepage structure record
        $homepageStructure = HomepageStructure::create([
            'section' => 'header',
            'header_text_id' => $headerText->id,
            'title_text_id' => $titleText->id,
            'button1_id' => $button1->id,
            'button2_id' => $button2->id,
        ]);

        $homepageStructure_reference = HomepageStructure::create([
            'section' => 'references',
            'reference_title_id' => $reference_title->id
        ]);

        $homepageStructure_quality = HomepageStructure::create([
            'section' => 'quality',
            'quality_title_id' => $qualityTitle->id,
            'quality_1_id' => $quality_1->id,
            'quality_2_id' => $quality_2->id,
            'quality_3_id' => $quality_3->id,
            'quality_4_id' => $quality_4->id,
            'quality_5_id' => $quality_5->id,
        ]);

        $homepageStructure->images()->createMany([
            [
                'section'  => 'header',
                'location' => '/img/5.png',
            ],
            [
                'section'  => 'header',
                'location' => '/img/6.png',
            ],
        ]);
    }
}
