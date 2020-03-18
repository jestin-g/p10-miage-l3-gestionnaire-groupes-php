<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appartenance extends Model
{
    protected $fillable = ['id_individu', 'id_group'];

    public function individu()
    {
        return $this->belongsTo('App\Individu');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
