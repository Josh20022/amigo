<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use App\Models\ContactpageText;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $facebook = ContactpageText::where('section', 'facebook_url')->first();
        $instagram = ContactpageText::where('section', 'instagram_url')->first();
        $twitter = ContactpageText::where('section', 'twitter_url')->first();
        $linkedin = ContactpageText::where('section', 'linkedin_url')->first();
        return view('news', ['news' => $news, 'facebook' => $facebook, 'instagram' => $instagram, 'twitter' => $twitter, 'linkedin' => $linkedin]);
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $news = new News();
        $news->title = $validatedData['title'];
        $news->description = $validatedData['description'];
        $news->save();
    
        $newsImage = new NewsImage();
        $imagePath = $request->file('image')->store('public/img');
        $newsImage->location = 'img/' . basename($imagePath);
        $newsImage->news_id = $news->id;
        $newsImage->save();
    
        return redirect()->route('dashboard-news')->with('success', 'Nieuwsbericht is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('dashboard-news-edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $news->title = $validatedData['title'];
        $news->description = $validatedData['description'];
        $news->save();
    
        if ($request->file('image')) {
            if ($news->image) {
                Storage::delete($news->image->location);
                $news->image->delete();
            }
    
            $imagePath = $request->file('image')->store('public/img');
            $newsImage = new NewsImage();
            $newsImage->location = $imagePath;
            $newsImage->news_id = $news->id;
            $newsImage->save();
    
            $news->news_image_id = $newsImage->id;
            $news->save();
        }
    
        return redirect()->route('dashboard-news')->with('success', 'Nieuwsbericht is succesvol bewerkt.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
    
        return redirect()->route('dashboard-news')->with('success', 'Nieuwsbericht is succesvol verwijderd.');
    }
}
