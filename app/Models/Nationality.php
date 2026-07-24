<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;

class Nationality extends Model
{
    //Un artista ha una nazionalità e una nazionalità può essere associata a più artisti
    public function artists() {
        return $this->hasMany(Artist::class);
    }
}
