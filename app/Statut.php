<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    protected $fillable = ['libelle'];

    public function individus()
    {
        return $this->hasMany('App\Individus');
    }
}
