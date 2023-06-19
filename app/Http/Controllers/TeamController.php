<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'job_title' => 'required',
            // hier eventuele verdere validatieregels toevoegen
        ]);

        Team::create($request->all());

        return redirect()->route('aboutpage_structure.index')
                         ->with('success','Teamlid succesvol toegevoegd');
    }

    public function edit(Team $team)
    {
        return view('dashboard-team-edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'full_name' => 'required',
            'job_title' => 'required',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'social_link1' => 'nullable|url',
            'social_link2' => 'nullable|url',
            'social_link3' => 'nullable|url',
        ]);
    
        if ($request->file('profile_photo')) {
            $imageName = time().'.'.$request->profile_photo->extension();
            $request->profile_photo->storeAs('public/img', $imageName);
    
            $team->profile_photo = 'img/'.$imageName;
        }
        
        $team->full_name = $request->get('full_name');
        $team->job_title = $request->get('job_title');
        $team->job_description = $request->get('job_description');
        if ($request->get('social_link1') == '') {
            $team->social_link1 = '';
        }
        if ($request->get('social_link2') == '') {
            $team->social_link2 = '';
        }
        if ($request->get('social_link3') == '') {
            $team->social_link3 = '';
        }
        if ($request->get('social_link1')) {
            $team->social_link1 = $request->get('social_link1');
        }
        if ($request->get('social_link2')) {
            $team->social_link2 = $request->get('social_link2');
        }
        if ($request->get('social_link3')) {
            $team->social_link3 = $request->get('social_link3');
        }
    
        $team->save();

        return redirect()->route('aboutpage_structure.index')
                         ->with('success','Teamlid succesvol geüpdate');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('aboutpage_structure.index')
                         ->with('success','Teamlid succesvol verwijderd');
    }
}