<?php

namespace App\Http\Controllers;

use App\Models\References;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $references = References::all();

        return view('dashboard-references', compact('references'));
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
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image',
            'url' => 'required',
            'testimonial.name' => 'required',
            'testimonial.function' => 'required',
            'testimonial.stars' => 'required',
            'testimonial.text' => 'required',
            'testimonial.foto' => 'required|image'
        ]);

        $testimonialData = $request->input('testimonial');

        $logoPath = $request->file('logo')->store('img', 'public');
        $testimonialData['foto'] = $request->file('testimonial.foto')->store('img', 'public');     

        $testimonial = Testimonials::create($testimonialData);
        $testimonial->save();
        $reference = new References([
            'name' => $request->get('name'),
            'logo' => $logoPath,
            'url' => $request->get('url'),
            'testimonial_id' => $testimonial->id,
        ]);
        $reference->save();

        return redirect()->route('references.index')
            ->with('success', 'Reference and Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(References $references)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reference = References::find($id);
        return view('dashboard-references-edit', compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'required',
            'testimonial.foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'testimonial.name' => 'required',
            'testimonial.function' => 'required',
            'testimonial.stars' => 'required',
            'testimonial.text' => 'required',
        ]);
    
        $reference = References::find($id);
        $testimonial = $reference->testimonial;
    
        // Behandel logo upload
        if($request->hasFile('logo')){
            $logoFile = $request->file('logo');
            $logoPath = $logoFile->storeAs('img', $logoFile->hashName());
            $reference->logo = $logoPath;
        }
    
        // Behandel foto upload
        if($request->hasFile('testimonial.foto')){

            $fotoFile = $request->file('testimonial.foto');
        
            $fotoPath = $fotoFile->storeAs('img', $fotoFile->hashName());
        
            $testimonial->foto = $fotoPath;
        
        }
        
        $reference->name = $request->get('name');
        
        $reference->url = $request->get('url');
        
        $reference->save();
        
        $testimonial->name = $request->get('testimonial')['name'];
        
        $testimonial->function = $request->get('testimonial')['function'];
        
        $testimonial->stars = $request->get('testimonial')['stars'];
        
        $testimonial->text = $request->get('testimonial')['text'];
        
        $testimonial->save();
        
        return redirect()->route('references.index')
            ->with('success', 'Reference and Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(References $references)
    {
        //
    }
}
