<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = "people";

    public function films()
    {
        return $this->belongsToMany(Film::class, 'films_characters');
    }

    public function species()
    {
        return $this->belongsTo(Species::class, "species_people");
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'vehicles_pilots', "vehicle_id");
    }
}
