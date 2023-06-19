<?php

namespace App\Http\Controllers;

use App\Models\ContactpageText;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\HomepageImage;
use App\Models\HomepageStructure;
use App\Models\References;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomepageStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal het laatste nieuwsbericht op
        $latestNews = News::latest()->first();
        $homepageHeader = HomepageStructure::where('section', 'header')->first(); /** haal de header data op op basis van sectionnaam */
        $structure = HomepageStructure::where('section', 'quality')->first(); /** haal de quality structure op */
        $referencestructure = HomepageStructure::where('section', 'references')->first(); /** haal de quality structure op */
        $references = References::all(); /** haal references op */
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        
        return view('welcome', ['homepageHeader' => $homepageHeader, 'latestNews' => $latestNews, 'quality' => $structure, 'referencestructure' => $referencestructure, 'references' => $references, 'facebook' => $facebook, 'instagram' => $instagram, 'twitter' => $twitter, 'linkedin' => $linkedin]);
    }

    public function dashboardindex()
    {
        
        $homepageHeader = HomepageStructure::where('section', 'header')->first();//haal header op op basis van section
        $structure = HomepageStructure::where('section', 'quality')->first(); /** haal de quality structure op */
        
        return view('dashboard-welcome', ['homepageHeader' => $homepageHeader, 'homepageStructure' => $structure]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HomepageStructure $homepageStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomepageStructure $homepageStructure)
    {
        $homepageHeader = HomepageStructure::where('section', 'header')->first();
        $headerImages = $homepageHeader->images;

    return view('homepage.edit', compact('homepageHeader', 'headerImages'));
    }

    public function updateQuality(Request $request, $id)
    {
        $homepageStructure = HomepageStructure::findOrFail($id);

        $homepageStructure->qualityTitle->update(['text' => $request->input('quality_title')]);
        $homepageStructure->quality1->update(['text' => $request->input('quality_1')]);
        $homepageStructure->quality2->update(['text' => $request->input('quality_2')]);
        $homepageStructure->quality3->update(['text' => $request->input('quality_3')]);
        $homepageStructure->quality4->update(['text' => $request->input('quality_4')]);
        $homepageStructure->quality5->update(['text' => $request->input('quality_5')]);
        // $homepageStructure->qualityTitle->text = $request->input('quality_title');

        // $homepageStructure->quality1->text = $request->input('quality_1');
        // $homepageStructure->quality2->text = $request->input('quality_2');
        // $homepageStructure->quality3->text = $request->input('quality_3');
        // $homepageStructure->quality4->text = $request->input('quality_4');
        // $homepageStructure->quality5->text = $request->input('quality_5');
        // $homepageStructure->save();
        return redirect()->route('dashboard-welcome')->with('success', 'Quality section updated successfully');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $homepageHeader = HomepageStructure::where('section', 'header')->first();
        $homepageStructure = HomepageStructure::find($id);

        // Validate request data
        $validator = Validator::make($request->all(), [
            'header_title' => 'required|string|max:255',
            'header_text' => 'required|string',
            'header_button1' => 'required|string|max:255',
            'header_button2' => 'required|string|max:255',
            'header_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Update homepage header
        // Haal de gerelateerde modellen op
        $homepageTitleText = $homepageHeader->titleText;
        $homepageHeaderText = $homepageHeader->headerText;
        $homepageHeaderButton1 = $homepageHeader->button1;
        $homepageHeaderButton2 = $homepageHeader->button2;

        // Werk de attributen van de gerelateerde modellen bij
        $homepageHeaderText->text = $request->header_text;
        $homepageHeaderText->save();

        $homepageHeaderButton1->label = $request->header_button1;
        $homepageHeaderButton1->save();

        $homepageHeaderButton2->label = $request->header_button2;
        $homepageHeaderButton2->save();

        // Werk de homepage structuur bij
        $homepageTitleText->text = $request->header_title;
        $homepageTitleText->save();

        // Upload new images
        if ($request->hasFile('header_images')) {
            foreach ($request->file('header_images') as $file) {
                // Check if file already exists
                if (HomepageImage::where('location', $file->getClientOriginalName())->count() > 0) {
                    continue;
                }
                $path = $file->store('public/img');
                $filename = basename($path); // verkrijg de gegenereerde naam
                $image = new HomepageImage;
                $image->location = "/img/{$filename}"; // opslaan als "/img/$filename"
                $image->section = 'header';
                $homepageHeader->images()->save($image);
            }
        }        
    
        // Delete images
        if ($request->has('delete_header_images')) {
            foreach ($request->input('delete_header_images') as $imageId) {
                $image = HomepageImage::find($imageId);
                Storage::delete('public/images/' . $image->filename);
                $image->delete();
            }
        }
    
        return redirect()
            ->back()
            ->with('success', 'Homepage header section updated successfully!');
    }

    public function deleteimage($id)
    {
        $homepageImage = HomepageImage::findOrFail($id);

        // Verwijder de afbeelding van de schijf
        Storage::delete($homepageImage->location);

        // Verwijder de afbeelding uit de database
        $homepageImage->delete();

        // Stuur de gebruiker terug naar de bewerk pagina
        return redirect()->back()->with('success', 'Afbeelding verwijderd');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomepageStructure $homepageStructure)
    {
        //
    }
}
