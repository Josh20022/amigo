<?php

namespace Database\Seeders;

use App\Models\References;
use App\Models\Testimonials;
use Illuminate\Database\Seeder;

class ReferenceTableSeeder extends Seeder
{
    public function run()
    {
        $references = [
            [
                'name' => 'madurodam',
                'logo' => 'img/logo_madurodam.png',
                'url' => 'https://www.madurodamevents.nl/nl',
            ],
            [
                'name' => 'makado',
                'logo' => 'img/logo_makado.png',
                'url' => 'https://www.madurodamevents.nl/nl',
            ],
            [
                'name' => 'marienhof',
                'logo' => 'img/logo_marienhof.png',
                'url' => 'https://www.madurodamevents.nl/nl',
            ],
            [
                'name' => 'pec-catering',
                'logo' => 'img/logo_pec-catering.png',
                'url' => 'https://www.madurodamevents.nl/nl',
            ],
            [
                'name' => 'spido',
                'logo' => 'img/logo_spido.png',
                'url' => 'https://www.madurodamevents.nl/nl',
            ],
        ];

        foreach ($references as $reference) {
            $testimonial = Testimonials::create([
                'foto' => '',
                'stars' => 5,
                'text' => 'We zijn erg goed behandeld door Amigo',
                'name' => 'voor en achternaam',
                'function' => 'CEO'
            ]);

            $ref = References::create([
                'name' => $reference['name'],
                'logo' => $reference['logo'],
                'url' => $reference['url'],
                'testimonial_id' => $testimonial->id
            ]);

            $testimonial->save();
        }
    }
}
