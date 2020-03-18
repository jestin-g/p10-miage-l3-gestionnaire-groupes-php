<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['libelle'];

    public function appartenances()
    {
        return $this->hasMany('App\Appartenance');
    }
}
