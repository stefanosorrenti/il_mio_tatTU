<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    //Un tattoo può avere più stili e uno stile può essere associato a più tatuaggi 
    public function tattos() {
        return $this->belongsToMany(Tattoo::class);
    }
}
