<?php

namespace App\Http\Controllers;

use App\Models\Tattoo;
use App\Models\Artist;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TattooController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $introTitle = 'Tutti i tatuaggi.';
        $introText = 'In questa sezione puoi trovare tutti i tatuaggi presenti 
        nel nostro database. Puoi visualizzare i dettagli di ciascun tatuaggio, 
        modificarli o eliminarli se necessario. Inoltre, puoi aggiungere nuovi 
        tatuaggi utilizzando il pulsante "Aggiungi Tatuaggio".';

        $tattoos = Tattoo::with('artist', 'styles')->orderBy('title')->get();
        return view('tattoo.index', compact('tattoos', 'introTitle', 'introText'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $introTitle = 'Aggiungi un nuovo tatuaggio';
        $introText = 'Compila il form sottostante per aggiungere un nuovo tatuaggio al database.';
        $artists = Artist::orderBy('name')->get();
        $styles = Style::orderBy('name')->get();
        return view('tattoo.create', compact('artists', 'styles', 'introTitle', 'introText'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newTattoo = new Tattoo();
        $newTattoo->title = $data['title'];
        $newTattoo->description = $data['description'];
        $newTattoo->time = $data['time'];
        $newTattoo->price = $data['price'];
        $newTattoo->artist_id = $data['artist_id'];
        //Controllo se l'immagine è stata caricata
        if (array_key_exists('image', $data)) {
            //Salvo l'immagine e aggiorno il path
            $newTattoo->image_path = Storage::put('tattoos', $data['image']);
        }


        $newTattoo->save();

        
        
        // Associo gli stili selezionati (N:N)
        if (array_key_exists('styles', $data)) {
            $newTattoo->styles()->attach($data['styles']);
        }

        return redirect()->route('tattoo.show', $newTattoo->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tattoo $tattoo)
    {
        return view('tattoo.show', compact('tattoo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tattoo $tattoo)
    {
        $introTitle = 'Modifica Tatuaggio';
        $introText = 'Compila il form sottostante per modificare le informazioni del tatuaggio.';
        $artists = Artist::orderBy('name')->get();
        $styles = Style::orderBy('name')->get();
        return view('tattoo.edit', compact('tattoo', 'artists', 'styles', 'introTitle', 'introText'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tattoo $tattoo)
    {
        $data = $request->all();
        $tattoo->title = $data['title'];
        $tattoo->description = $data['description'];
        $tattoo->time = $data['time'];
        $tattoo->price = $data['price'];
        $tattoo->artist_id = $data['artist_id'];

        
        //Controllo se l'immagine è stata caricata
        if (array_key_exists('image', $data)) {

            //Controllo se l'immagine già esiste
            if ($tattoo->image_path) {

                Storage::delete($tattoo->image_path);
            }

            //Salvo l'immagine e aggiorno il path
            $tattoo->image_path = Storage::put('tattoos', $data['image']);
        }
        
        
        $tattoo->update();
        


        // Aggiorno gli stili selezionati (N:N)
        if (array_key_exists('styles', $data)) {
            $tattoo->styles()->sync($data['styles']);
        } else {
            $tattoo->styles()->detach();
        }

        return redirect()->route('tattoo.show', $tattoo->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tattoo $tattoo)
    {
        
        $tattoo->delete();

        return redirect()->route('tattoo.index');
    }
}
