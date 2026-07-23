<?php

namespace App\Http\Controllers;

use App\Models\Tattoo;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TattooController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tattoos = Tattoo::with('artist', 'styles')->get();
        return view('tattoo.index', compact('tattoos'));
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
    public function show(Tattoo $tattoo)
    {
        return view('tattoo.show', compact('tattoo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tattoo $tattoo)
    {
        $artists = Artist::all();
        return view('tattoo.edit', compact('tattoo', 'artists'));
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

        //Cotrollo se l'immagina è stata caricata
        if(array_key_exists('image', $data)) {

            //Controllo se l'immagine già esiste
            if($tattoo->image_path) {

                Storage::delete($tattoo->image_path);
            }

            //Salvo l'immagine e aggiorno il path
            $tattoo->image_path = Storage::put('tattoos', $data['image']);
        }

        $tattoo->save();
        return redirect()->route('tattoo.index');
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
