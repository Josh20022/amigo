<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\OfferCategory;
use App\Models\ContactpageText;
use Illuminate\Support\Facades\Storage;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Offer $offer, OfferCategory $offerCategory)
    {
        $acts = $offerCategory->acts;
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        return view('acts',['facebook' => $facebook, 'instagram' => $instagram, 'twitter' => $twitter, 'linkedin' => $linkedin, 'acts' => $acts, 'offer' => $offer, 'offerCategory' => $offerCategory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Offer $offer, OfferCategory $offerCategory)
    {
        $acts = $offerCategory->acts;

        return view('offers.offerCategories.acts.create', compact('offer', 'offerCategory', 'acts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Offer $offer, OfferCategory $offerCategory)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_desc' => 'required',
            'description' => 'required',
            'act_type' => 'required',
            'time_span' => 'required',
            'youtube_iframe' => 'required',
            'video_tumblr' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);

        // Store the image and get the file path.
        $image = $request->file('video_tumblr');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/img', $imageName);

        // Create a new act with the request data.
        $act = new Act;
        $act->title = $request->title;
        $act->short_desc = $request->short_desc;
        $act->description = $request->description;
        $act->act_type = $request->act_type;
        $act->time_span = $request->time_span;
        $act->youtube_iframe = $request->youtube_iframe;
        $act->video_tumblr = 'img/'.$imageName;
        $act->offer_category_id = $offerCategory->id;
        $act->save();

        // Redirect to the acts page with a success message.
        return redirect(route('create.acts', ['offer' => $offer->id, 'offerCategory' => $offerCategory->id]))->with('success', 'Act created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer, OfferCategory $offerCategory, Act $act)
    {
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        return view('actdetail', [
            'offer' => $act->offerCategory->offer,
            'offerCategory' => $act->offerCategory,
            'act' => $act,
            'facebook' => $facebook, 
            'instagram' => $instagram, 
            'twitter' => $twitter, 
            'linkedin' => $linkedin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer, OfferCategory $offerCategory, Act $act)
    {
        return view('offers.offerCategories.acts.edit', compact('offer', 'offerCategory', 'act'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer, OfferCategory $offerCategory, Act $act)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_desc' => 'required',
            'description' => 'required',
            'act_type' => 'required',
            'time_span' => 'required',
            'youtube_iframe' => 'required',
        ]);

        if ($request->hasFile('video_tumblr')) {
            $request->validate([
                'video_tumblr' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5048',
            ]);

            // Delete the old image
            Storage::delete('public/' . $act->video_tumblr);

            // Store the new image and get the file path.
            $image = $request->file('video_tumblr');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/img', $imageName);

            // Update the video_tumblr in the act
            $act->video_tumblr = 'img/'.$imageName;
        }

        // Update the other fields in the act
        $act->title = $request->title;
        $act->short_desc = $request->short_desc;
        $act->description = $request->description;
        $act->act_type = $request->act_type;
        $act->time_span = $request->time_span;
        $act->youtube_iframe = $request->youtube_iframe;

        $act->save();

        // Redirect to the acts page with a success message.
        return redirect(route('create.acts', ['offer' => $offer->id, 'offerCategory' => $offerCategory->id]))->with('success', 'Act updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer, OfferCategory $offerCategory, Act $act)
    {
        // Delete the image associated with the act
        Storage::delete('public/' . $act->video_tumblr);
        
        $act->delete();

        return redirect()->route('create.acts', ['offer' => $offer->id, 'offerCategory' => $offerCategory->id])->with('success', 'Act deleted successfully!');
    }
}
