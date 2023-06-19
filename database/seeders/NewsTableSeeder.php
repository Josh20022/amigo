<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsImage;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        // Maak een nieuw News artikel
        $news = News::create([
            'title' => 'Conny Anders bij Vitalogisch',
            'description' => 'Wil je ook een ludieke break tijdens een meeting of event? Boek dan Conny Anders!
            Conny is een bijzondere vrouw. Het beroep van gastvrouw is haar roeping. Ze is gedreven, spontaan, gezellig en geïnteresseerd in uw gasten. Met enthousiasme leidt zij uw evenement in goede banen en alle activiteiten waar u op zo’n dag een ‘leading lady’ voor nodig heeft, zijn aan haar toevertrouwd. Met een stralend humeur ontvangt ze uw gasten en stuurt ze hen in de juiste richting. Zoals afgelopen week bij Vitalogisch.'
        ]);
        
        // Maak een bijbehorende NewsImage
        $newsImage = new NewsImage;
        $newsImage->location = 'img/news.jpg';
        $news->image()->save($newsImage);
    }
}
