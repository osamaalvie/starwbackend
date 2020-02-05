<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = "films";

    public function people()
    {
        return $this->belongsToMany(People::class, 'films_characters');

    }


}
