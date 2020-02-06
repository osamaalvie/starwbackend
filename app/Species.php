<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $table = "species";


    public function characters()
    {
        return $this->belongsToMany(People::class, "species_people");
    }
}
