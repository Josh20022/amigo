<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\ContactpageText;
use App\Models\AboutpageStructure;

class AboutpageStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structure = AboutpageStructure::all()->first();
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        return view('about', ['structure' => $structure, 'facebook' => $facebook, 'instagram' => $instagram, 'twitter' => $twitter, 'linkedin' => $linkedin]);
    }
    
    public function cmsindex()
    {
        $teamMembers = Team::all();
        $aboutpageStructure = AboutpageStructure::all()->first();
        return view('dashboard-about', ['aboutpageStructures' => $aboutpageStructure, 'teamMembers' => $teamMembers]);
    }

    public function update(Request $request, AboutpageStructure $aboutpageStructure)
    {
        // validate the request
        $validatedData = $request->validate([
            'title' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'team_title' => 'required',
            // add validation for other fields
        ]);

        // update the about page structure and the related texts
        $aboutpageStructure->title->update(['text' => $validatedData['title']]);
        $aboutpageStructure->description1->update(['text' => $validatedData['description1']]);
        $aboutpageStructure->description2->update(['text' => $validatedData['description2']]);
        $aboutpageStructure->teamTitle->update(['text' => $validatedData['team_title']]);
        // update other fields
        $teamMembers = Team::all();
        $aboutpageStructure = AboutpageStructure::all()->first();
        return view('dashboard-about', ['aboutpageStructures' => $aboutpageStructure, 'teamMembers' => $teamMembers]);
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
    public function show(AboutpageStructure $aboutpageStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutpageStructure $aboutpageStructure)
    {
        //
    }
}
