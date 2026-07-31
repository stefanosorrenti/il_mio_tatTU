<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Style;
class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $introTitle = 'Tutti gli stili.';
        $introText = 'In questa sezione puoi trovare tutti gli stili presenti 
        nel nostro database. Puoi visualizzare i dettagli di ciascun stile, 
        modificarli o eliminarli se necessario. Inoltre, puoi aggiungere nuovi 
        stili utilizzando il pulsante "Aggiungi Stile".';
        
        $styles = Style::orderBy('name')->get();
        return view('style.index', compact('styles', 'introTitle', 'introText'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $introTitle = 'Aggiungi un nuovo stile';
        $introText = 'Compila il form sottostante per aggiungere un nuovo stile al database.';
        return view('style.create', compact('introTitle', 'introText'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); 
        $style = new Style();
        $style->name = $data['name'];
        $style->save();

        return redirect()->route('style.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Style $style)
    {
        return view('style.show', compact('style'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Style $style)
    {
        $introTitle = 'Modifica Stile';
        $introText = 'Compila il form sottostante per modificare le informazioni dello stile.';
        return view('style.edit', compact('style', 'introTitle', 'introText'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Style $style)
    {
        $data = $request->all(); 
        $style->name = $data['name'];
        $style->update();

        return redirect()->route('style.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Style $style)
    {
        $style->delete();
        return redirect()->route('style.index');
    }
}
