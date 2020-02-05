<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = "films";

    protected $appends = ['totalPeople', 'sumPeople'];
    public function planet()
    {
        return $this->belongsToMany(Planet::class, 'films_planets');

    }

    public function people()
    {
        return $this->belongsToMany(People::class, 'films_characters');

    }

    public function getTotalPeopleAttribute()
    {
        return $this->people()->count();
    }

    public function getSumPeopleAttribute()
    {
        return $this->people->sum('totalPeople');
    }


}
