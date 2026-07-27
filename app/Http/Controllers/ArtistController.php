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
        $introTitle = 'Tutti gli artisti';
        $introText = 'In questa sezione puoi trovare tutti gli artisti presenti 
        nel nostro database. Puoi visualizzare i dettagli di ciascun artista, 
        modificarli o eliminarli se necessario. Inoltre, puoi aggiungere nuovi 
        artisti utilizzando il pulsante "Aggiungi Artista".';

        $artists = Artist::all();
        return view('artist.index', compact('artists', 'introTitle', 'introText'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $introTitle = 'Aggiungi un nuovo artista';
        $introText = 'Compila il form sottostante per aggiungere un nuovo artista al database.';

        $nationalities = Nationality::all()->sortBy('name');
        
        return view('artist.create', compact('nationalities', 'introTitle', 'introText'));
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
        $introTitle = 'Modifica artista';
        $introText = 'Compila il form sottostante per modificare le informazioni dell\'artista.';

        // Recupero tutte le nazionalità in ordine alfabetico
        $nationalities = Nationality::all()->sortBy('name');
        return view('artist.edit', compact('artist', 'nationalities', 'introTitle', 'introText'));
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
