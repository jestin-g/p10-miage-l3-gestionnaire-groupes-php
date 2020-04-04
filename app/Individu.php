<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individu extends Model
{
    protected $fillable = ['nom', 'prenom', 'email', 'num', 'statut_id', 'annuaire_id'];

    public function statut()
    {
        return $this->belongsTo('App\Statut');
    }

    public function annuaire()
    {
        return $this->belongsTo('App\Annuaire');
    }

    public function appartenances()
    {
        return $this->belongsToMany('App\Appartenance');
    }
}
