<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $table = "planets";

    public function films()
    {
        return $this->belongsToMany(Film::class, 'films_planets');
    }

    public function pilots()
    {
        return $this->films()->sum("TotalPeople");
    }

    public function total()
    {
        return $this->pilots()->sum("films.people_count");
    }
}
