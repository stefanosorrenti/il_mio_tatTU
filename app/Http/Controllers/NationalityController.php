<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Nationality;  


class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $introTitle = 'Tutte le nazionalità';
        $introText = 'In questa sezione puoi trovare tutte le nazionalità presenti
        nel nostro database. Puoi visualizzare i dettagli di ciascuna nazionalità,
        modificarle o eliminarle se necessario. Inoltre, puoi aggiungere nuove
        nazionalità utilizzando il pulsante "Aggiungi Nazionalità".';

        $nationalities = Nationality::orderBy('name')->get();
        return view('nationality.index', compact('nationalities', 'introTitle', 'introText'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $introTitle = 'Aggiungi Nazionalità';
        $introText = 'Compila il form sottostante per aggiungere una nuova nazionalità al nostro database.';
        return view('nationality.create', compact('introTitle', 'introText'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $nationality = new Nationality();
        $nationality->name = $data['name'];
        $nationality->save();

        return redirect()->route('nationality.show', $nationality->id);


    }

    /**
     * Display the specified resource.
     */
    public function show(Nationality $nationality)
    {
        return view('nationality.show', compact('nationality'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nationality $nationality)
    {
        $introTitle = 'Modifica Nazionalità';
        $introText = 'Compila il form sottostante per modificare le informazioni della nazionalità.';

        return view('nationality.edit', compact('nationality', 'introTitle', 'introText'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nationality $nationality)
    {
        $data = $request->all();
        $nationality->name = $data['name'];
        $nationality->save();

        return redirect()->route('nationality.show', $nationality->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nationality $nationality)
    {
        $nationality->delete();
        return redirect()->route('nationality.index');
    }
    
}
