<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = "vehicles";

    public function pilots()
    {
        return $this->belongsToMany(People::class, 'vehicles_pilots', "people_id");
    }
}
