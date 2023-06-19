<?php

namespace App\Http\Controllers;

use App\Models\Act;
use Illuminate\Http\Request;
use App\Models\ContactpageText;

use function PHPUnit\Framework\isEmpty;

class FavouriteController extends Controller
{
    public function index()
    {
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        $favourites = session()->get('favourites');
        
        if (empty($favourites)) {
            // Als er geen favorieten zijn, stuur de gebruiker terug naar de vorige pagina
            return redirect()->back();
        }

        // Haal de act-ids uit de favorieten
        $actIds = array_keys($favourites);
        
        // Haal de bijbehorende acts op uit de database
        $acts = Act::whereIn('id', $actIds)->get();

        return view('favourite-checkout', ['favorieten' => $favourites,'facebook' => $facebook, 'instagram' => $instagram, 'twitter' => $twitter, 'linkedin' => $linkedin, 'acts' => $acts]);
    }

    public function addToFavourites($id)
    {
        $act = Act::find($id);

        $favourites = session()->get('favourites');

        // als favorieten leeg is, voeg dan de eerste act toe
        if(!$favourites) {
            $favourites = [
                    $id => [
                        "title" => $act->titel,
                        "short_desc" => $act->omschrijving,
                        "description" => $act->txt1,
                        "act_type" => $act->soort,
                        "time_span" => $act->tijdsduur,
                        "youtube_iframe" => $act->youtube,
                        "video_tumblr" => $act->plaatje1->url,
                        "offer_category_id" => $act->offerCategory->id
                    ]
            ];

            session()->put('favourites', $favourites);
        } else {

            // als de act al bestaat in favorieten, doe dan niets
            if(isset($favourites[$id])) {
                return redirect()->back()->with('success', 'Act is already in your favourites!');
            } else {

                // als de act nog niet in favorieten zit, voeg het dan toe
                $favourites[$id] = [
                    "title" => $act->titel,
                    "short_desc" => $act->omschrijving,
                    "description" => $act->txt1,
                    "act_type" => $act->soort,
                    "time_span" => $act->tijdsduur,
                    "youtube_iframe" => $act->youtube,
                    "video_tumblr" => $act->plaatje1->url,
                    "offer_category_id" => $act->offerCategory->id
                ];

                session()->put('favourites', $favourites);
                }
            }

        return redirect()->back()->with('success', 'Act added to favourites successfully!');
    }
    
    
    public function removeFromFavourites($id)
    {
        $favourites = session()->get('favourites');

        if(isset($favourites[$id])) {
            unset($favourites[$id]);

            session()->put('favourites', $favourites);
        }

    return redirect()->back()->with('success', 'Act removed successfully from favourites!');
    }


}
