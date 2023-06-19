<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Plaatje;
use Illuminate\Http\Request;
use App\Models\ContactpageText;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all(); // Haal alle offers op uit de database.
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        return view('offer', ['offers' => $offers, 'facebook' => $facebook, 'instagram' => $instagram, 'twitter' => $twitter, 'linkedin' => $linkedin]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $offers = Offer::all(); // Haal alle offers op uit de database.
    
        return view('offers.create', compact('offers'));
        // Hier stuur je de offers naar de create view van offers.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'image_location' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:15000',
            'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:15000',
        ]);
    
        // Sla de afbeelding op in de storage en krijg de bestandsnaam.
        $image = $request->file('image_location');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/img/plaatjes', $imageName);
    
        // Sla de banner afbeelding op in de storage en krijg de bestandsnaam.
        $banner = $request->file('banner');
        $bannerName = time().'.'.$banner->getClientOriginalExtension();
        $banner->storeAs('public/img/plaatjes', $bannerName);
    
        // Maak een nieuw Plaatje record aan voor de afbeelding.
        $plaatje = new Plaatje;
        $plaatje->titel = $imageName;
        $plaatje->url = $imageName;
        $plaatje->omschrijving = '';
        $plaatje->width = 0;
        $plaatje->height = 0;
        $plaatje->save();

        // Maak een nieuw Plaatje record aan voor de banner.
        $plaatje_banner = new Plaatje;
        $plaatje_banner->titel = $bannerName;
        $plaatje_banner->url = $bannerName;
        $plaatje_banner->omschrijving = '';
        $plaatje_banner->width = 0;
        $plaatje_banner->height = 0;
        $plaatje_banner->save();
    
        // Maak een nieuw Offer aan met de data uit het request.
        $offer = new Offer;
        $offer->titel = $request->title;
        $offer->pl = $plaatje->id;
        $offer->banner = $plaatje_banner->id;
        $offer->metatitel = '';
        $offer->metadesc = '';
        $offer->metakeys = '';
        $offer->omschrijving = '';
        $offer->volgorde = 0;
        $offer->url = '';
        $offer->save();
    
        // Redirect naar de offers pagina met een succesvol bericht.
        return redirect(route('create.offer'))->with('success', 'Offer created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        return view('offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);
    
        $offer = Offer::findOrFail($id);
    
        if ($request->hasFile('image_location')) {
            // Validatie voor de afbeelding
            $request->validate([
                'image_location' => 'image|mimes:jpg,png,jpeg,gif,svg|max:15000',
            ]);
    
            // Verwijder de oude afbeelding
            Storage::delete('public/img/plaatjes/' . $offer->plaatje->url);
    
            // Sla de nieuwe afbeelding op in de storage en krijg de bestandsnaam.
            $image = $request->file('image_location');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/img/plaatjes', $imageName);
    
            // Update de image_location in de offer
            $offer->plaatje->titel = $imageName;
            $offer->plaatje->url = $imageName;
            $offer->plaatje->save();
        }
    
        if ($request->hasFile('banner')) {
            // Validatie voor de banner afbeelding
            $request->validate([
                'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:15000',
            ]);
    
            // Verwijder de oude banner afbeelding
            Storage::delete('public/img/plaatjes/' . $offer->banner_plaatje->url);
    
            // Sla de nieuwe banner afbeelding op in de storage en krijg de bestandsnaam.
            $banner = $request->file('banner');
            $bannerName = time().'.'.$banner->getClientOriginalExtension();
            $banner->storeAs('public/img/plaatjes', $bannerName);
    
            // Update de banner_plaatje in de offer
            $offer->banner_plaatje->titel = $bannerName;
            $offer->banner_plaatje->url = $bannerName;
            $offer->banner_plaatje->save();
        }
    
        // Update de title in de offer
        $offer->titel = $request->title;
    
        $offer->save();
    
        // Redirect naar de offers pagina met een succesvol bericht.
        return redirect(route('create.offer'))->with('success', 'Offer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
    
        return redirect()->route('create.offer')->with('success', 'Aanbieding succesvol verwijderd!');
    }
}
