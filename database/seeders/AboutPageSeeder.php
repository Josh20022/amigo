<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutPageText;
use App\Models\AboutPageStructure;
use App\Models\Team;

class AboutPageSeeder extends Seeder
{
    public function run()
    {
        // Maak de texts aan
        $titleText = AboutPageText::create(['text' => 'Wie zijn we?']);
        $descriptionText1 = AboutPageText::create(['text' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error dolore dolorem eum veniam, sit, dolores vitae nemo quas vel expedita recusandae tempora culpa illo nulla obcaecati maxime. Rerum dolor repudiandae quod eius voluptates non fugiat mollitia, temporibus minima minus quisquam accusantium veritatis ut eum quas eligendi libero cumque voluptatibus. Architecto!']);
        $descriptionText2 = $descriptionText1; // Ik begrijp dat de twee descriptions dezelfde tekst hebben
        $teamTitleText = AboutPageText::create(['text' => 'Ons team.']);

        // Maak de AboutPageStructure aan
        $aboutPageStructure = AboutPageStructure::create([
            'structure' => '', // Vul in met de gewenste structuur
            'title_id' => $titleText->id,
            'description1_id' => $descriptionText1->id,
            'description2_id' => $descriptionText2->id,
            'team_title_id' => $teamTitleText->id
        ]);

        // Maak de Teams aan
        for ($i = 0; $i < 3; $i++) {
            Team::create([
                'full_name' => 'Full Name ' . ($i+1),
                'job_title' => 'Job Title ' . ($i+1),
                'job_description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis laudantium repellat quod!',
                'profile_photo' => 'img/image.png',
                'social_link1' => 'url/to/social' . ($i+1),
                'social_link2' => 'url/to/social' . ($i+1),
                'social_link3' => 'url/to/social' . ($i+1),
                'aboutpage_structure_id' => $aboutPageStructure->id
            ]);
        }
    }
}