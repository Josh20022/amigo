<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactpageText;
use App\Models\ContactpageStructure;

class ContactpageStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactpageStructure = ContactpageStructure::all()->first();
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        return view('contact', ['structure' => $contactpageStructure, 'facebook' => $facebook, 'instagram' => $instagram, 'twitter' => $twitter, 'linkedin' => $linkedin]);
    }

    public function cmsindex()
    {
        $contactpageStructure = ContactpageStructure::all()->first();
        return view('dashboard-contact', ['contactpageStructures' => $contactpageStructure]);
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
    public function show(ContactpageStructure $contactpageStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactpageStructure $contactpageStructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contactpageStructure = ContactpageStructure::find($id);
    
        $contactpageStructure->title->update(['text' => $request->title]);
        $contactpageStructure->description->update(['text' => $request->description]);
        $contactpageStructure->formName->update(['text' => $request->form_name]);
        $contactpageStructure->formEmail->update(['text' => $request->form_email]);
        $contactpageStructure->formEmailMessage->update(['text' => $request->form_email_message]);
        $contactpageStructure->formMessage->update(['text' => $request->form_message]);
        $contactpageStructure->formNewsletter->update(['text' => $request->form_newsletter]);
        $contactpageStructure->formSubmit->update(['text' => $request->form_submit]);
        $contactpageStructure->officeTitle->update(['text' => $request->office_title]);
        $contactpageStructure->officeDesc->update(['text' => $request->office_desc]);
        $contactpageStructure->phoneTitle->update(['text' => $request->phone_title]);
        $contactpageStructure->phoneDesc->update(['text' => $request->phone_desc]);
        $contactpageStructure->facebookUrl->update(['text' => $request->facebook_url]);
        $contactpageStructure->instagramUrl->update(['text' => $request->instagram_url]);
        $contactpageStructure->twitterUrl->update(['text' => $request->twitter_url]);
        $contactpageStructure->linkedinUrl->update(['text' => $request->linkedin_url]);
    
        return redirect()->route('contactpage_structure.cmsindex')->with('success', 'De contactpagina-tekst is bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactpageStructure $contactpageStructure)
    {
        //
    }
}
