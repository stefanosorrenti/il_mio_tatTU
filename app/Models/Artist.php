<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tattoo;
use App\Models\Nationality;

class Artist extends Model
{
    //Un artista può creare più tatuaggi
    public function tattos() {
        return $this->hasMany(Tattoo::class);
    }

    //Un artista ha una nazionalità e una nazionalità può essere associata a più artisti
    public function nationality() {
        return $this->belongsTo(Nationality::class);
    }
}
