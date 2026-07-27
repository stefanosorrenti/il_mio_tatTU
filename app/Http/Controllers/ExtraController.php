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

        $introTitle = 'Statistiche del database';
        $introText = 'In questa sezione puoi visualizzare alcune statistiche relative al nostro database di tatuaggi, artisti e stili.'; 

        $artistsCount = Artist::count();
        $stylesCount = Style::count();
        $tattoosCount = Tattoo::count();
        return view('extra', compact('introTitle', 'introText', 'artistsCount', 'stylesCount', 'tattoosCount'));
    }
}
