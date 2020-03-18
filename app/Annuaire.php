<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annuaire extends Model
{
    protected $fillable = ['libelle'];

    public function individus()
    {
        return $this->hasMany('App\Individus');
    }
}
