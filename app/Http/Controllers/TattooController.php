<?php

namespace App\Http\Controllers;

use App\Models\Tattoo;
use Illuminate\Http\Request;

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tattoo $tattoo)
    {
        return view('tattoo.edit', compact('tattoo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tattoo $tattoo)
    {
      
        $tattoo->delete();

        return redirect()->route('tattoo.index')->with('success', 'Tatuaggio eliminato con successo.');
    }
}
