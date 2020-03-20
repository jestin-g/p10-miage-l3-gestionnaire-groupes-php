<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Individu;
use App\Annuaire;
use App\Statut;

class IndividuController extends Controller
{
    /**
     * Récupère tout les individus et retourne la vue permettant de les afficher
     * 
     */
    public function index()
    {
        $individus = Individu::orderBy('nom')->paginate(30);

        return view('individu.index', compact('individus'));
    }

    /**
     * Retourne la vue permettant de créer un individu
     * 
     */
    public function create()
    {
        $annuaires = Annuaire::all();
        $statuts = Statut::all();

        return view('individu.create', [
            'annuaires' => $annuaires,
            'statuts' => $statuts
        ]);
    }

    /**
     * Sauvegarder un nouvel individu dans la base
     * 
     */
    public function store()
    {
        $individu = new Individu();

        $individu->nom = request('nom');
        $individu->prenom = request('prenom');
        $individu->email = request('email');
        $individu->num = request('num');
        $individu->statut_id = request('statut');
        $individu->annuaire_id = request('annuaire');

        $individu->save();

        Session::flash('message', 'Individu créé avec succès !');

        return redirect()->route('individus.index');
    }

    /**
     * Supprimer un individu spécifique de la base
     * 
     */
    public function destroy($id)
    {
        $individu = Individu::find($id);
        $individu->delete();

        Session::flash('message', "Individu supprimé avec succès !");

        return redirect()->route('individus.index');
    }


}
