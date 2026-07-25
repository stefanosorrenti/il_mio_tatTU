<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Artist;
use App\Models\Style;
use App\Models\Tattoo;
class ExtraController extends Controller
{
    public function extra() {
        $artistsCount = Artist::count();
        $stylesCount = Style::count();
        $tattoosCount = Tattoo::count();
        return view('extra', compact('artistsCount', 'stylesCount', 'tattoosCount'));
    }
}
