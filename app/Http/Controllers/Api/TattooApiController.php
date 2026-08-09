<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tattoo;

class TattooApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        /* Tattoo + artist + nationality + styles */
        $tattoos = Tattoo::with('artist', 'artist.nationality', 'styles')->get();
        
        /* Gestico la path */
        foreach ($tattoos as $tattoo) {
            $tattoo->image_path = asset('storage/' . $tattoo->image_path);
            
        }

        
        return response()->json([
            'success' => true,
            'data' => $tattoos
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tattoo = Tattoo::with('artist', 'artist.nationality', 'styles')->find($id);
        /* @dd($tattoo); */
        if (!$tattoo) {
            return response()->json([
                'success' => false,
                'message' => 'Tattuaggio non trovato'
            ], 404);
        }

        /* Gestico la path */
        $tattoo->image_path = asset('storage/' . $tattoo->image_path);
        return response()->json([
            'success' => true,
            'data' => $tattoo
        ]);
    }
}
