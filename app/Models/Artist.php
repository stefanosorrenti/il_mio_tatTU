<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //Un artista può creare più tatuaggi
    public function tattos() {
        return $this->hasMany(Tattoo::class);
    }
}
