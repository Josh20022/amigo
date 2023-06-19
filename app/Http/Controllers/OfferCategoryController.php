<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Plaatje;
use Illuminate\Http\Request;
use App\Models\OfferCategory;
use App\Models\ContactpageText;
use Illuminate\Support\Facades\Storage;

class OfferCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Offer $offer)
    {
        $offerCategories = $offer->offerCategories;
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        return view('offerCategories', ['offerCategories' => $offerCategories, 'facebook' => $facebook, 'instagram' => $instagram, 'twitter' => $twitter, 'linkedin' => $linkedin, 'offer' => $offer]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Offer $offer)
    {
        $offerCategories = $offer->offerCategories;
        return view('offers.offerCategories.create', compact('offer', 'offerCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $offerId)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image_location' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:15000',
        ]);
    
        // Sla de afbeelding op in de storage en krijg de bestandsnaam.
        $image = $request->file('image_location');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/img/plaatjes', $imageName);
    
        // Maak een nieuw Plaatje record aan voor de afbeelding.
        $plaatje = new Plaatje;
        $plaatje->titel = $imageName;
        $plaatje->url = $imageName;
        $plaatje->omschrijving = '';
        $plaatje->width = 0;
        $plaatje->height = 0;
        $plaatje->save();
    
        // Maak een nieuw OfferCategory aan met de data uit het request.
        $offerCategory = new OfferCategory;
        $offerCategory->titel = $request->title;
        $offerCategory->pl = $plaatje->id;
        $offerCategory->volgorde = 0;
        $offerCategory->url = '';
        $offerCategory->omschrijving = '';
        $offerCategory->metatitel = '';
        $offerCategory->metadesc = '';
        $offerCategory->metakeys = '';
        $offerCategory->hoofdcat = $offerId;
        $offerCategory->save();
    
        // Redirect naar de create.offerCategories pagina met een succesvol bericht.
        return redirect(route('create.offerCategories', $offerId))->with('success', 'Offer Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OfferCategory $offerCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer, OfferCategory $offerCategory)
    {
        return view('offers.offerCategories.edit', compact('offer', 'offerCategory'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer, OfferCategory $offerCategory)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image_location' => 'image|mimes:jpg,png,jpeg,gif,svg|max:15000',
        ]);
    
        if ($request->hasFile('image_location')) {
            // Verwijder de oude afbeelding
            Storage::delete('public/img/plaatjes/' . $offerCategory->plaatje->titel);
    
            // Sla de nieuwe afbeelding op in de storage en krijg de bestandsnaam.
            $image = $request->file('image_location');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/img/plaatjes', $imageName);
    
            // Update het Plaatje record voor de afbeelding.
            $offerCategory->plaatje->titel = $imageName;
            $offerCategory->plaatje->url = $imageName;
            $offerCategory->plaatje->save();
        }
    
        // Update de overige velden in het OfferCategory model.
        $offerCategory->titel = $request->title;
        $offerCategory->volgorde = 0;
        $offerCategory->url = '';
        $offerCategory->omschrijving = '';
        $offerCategory->metatitel = '';
        $offerCategory->metadesc = '';
        $offerCategory->metakeys = '';
        $offerCategory->save();
    
        // Redirect naar de create.offerCategories pagina met een succesvol bericht.
        return redirect(route('create.offerCategories', $offer->id))->with('success', 'Offer Category updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer, OfferCategory $offerCategory)
    {
        $offerCategory->delete();

        return redirect()->route('create.offerCategories', $offer->id)->with('success', 'Offer Category successfully deleted!');
    }
}
