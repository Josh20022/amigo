<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\OfferCategory;
use App\Models\ContactpageText;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('term');
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        
        // Zoekactie op acts
        $acts = Act::where('titel', 'like', '%'.$searchTerm.'%')
                    ->orWhere('omschrijving', 'like', '%'.$searchTerm.'%')
                    ->orWhere('txt1', 'like', '%'.$searchTerm.'%')
                    ->get();

        // Zoekactie op offerCategories
        $offerCategories = OfferCategory::where('titel', 'like', '%'.$searchTerm.'%')->get();

        // Zoekactie op offers
        $offers = Offer::where('titel', 'like', '%'.$searchTerm.'%')->get();

        return view('search.results', compact('acts', 'offerCategories', 'offers', 'facebook', 'instagram', 'twitter', 'linkedin', 'searchTerm'));
    }
}
