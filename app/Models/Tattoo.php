<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tattoo extends Model
{
    //Un tatuaggio appartiene a un artista
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    //Un tatuaggio può avere più stili e uno stile può essere associato a più tatuaggi
    public function styles()
    {
        // Relazione Molti-a-Molti
        return $this->belongsToMany(Style::class);
    }
}

