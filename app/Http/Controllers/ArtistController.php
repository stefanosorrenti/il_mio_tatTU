<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Nationality;
class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();
        return view('artist.index', compact('artists'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationalities = Nationality::all()->sortBy('name');
        
        return view('artist.create', compact('nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $newArtist = new Artist();
        $newArtist->name = $data['name'];
        $newArtist->surname = $data['surname'];
        $newArtist->age = $data['age'];
        $newArtist->bio = $data['bio'];
        $newArtist->nationality_id = $data['nationality_id'];
        $newArtist->save();
        return redirect()->route('artist.show', $newArtist->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return view('artist.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        $nationalities = Nationality::all()->sortBy('name');
        return view('artist.edit', compact('artist', 'nationalities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $data = $request->all();

        $artist->name = $data['name'];
        $artist->surname = $data['surname'];
        $artist->age = $data['age'];
        $artist->bio = $data['bio'];
        $artist->nationality_id = $data['nationality_id'];
        $artist->update();

        return redirect()->route('artist.show', $artist->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('artist.index');
    }
}
