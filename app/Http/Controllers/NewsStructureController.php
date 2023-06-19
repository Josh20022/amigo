<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\NewsStructure;

class NewsStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboardindex()
    { /** haal de header data op op basis van sectionnaam */
        $news = News::all();
        return view('dashboard-news', ['news' => $news]); 
    }

    public function index()
    {
        //
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
    public function show(NewsStructure $newsStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsStructure $newsStructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsStructure $newsStructure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsStructure $newsStructure)
    {
        //
    }
}
