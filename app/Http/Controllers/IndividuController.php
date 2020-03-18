<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Individu;

class IndividuController extends Controller
{

    public function index()
    {
        $individus = Individu::all();

        return view('individu.index', compact('individus'));
    }

    public function create()
    {
        return view('individu.create');
    }

    public function store()
    {
        $individu = new Individu();

        $individu->nom = request('nom');
        $individu->prenom = request('prenom');
        $individu->email = request('email');
        $individu->num = request('num');
        $individu->statut = request('statut');
        $individu->annuaire = request('annuaire');

        $individu->save();
    }


}
