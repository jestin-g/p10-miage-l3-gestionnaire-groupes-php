<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;

use App\Group;
use App\Individu;
use App\Appartenance;

class GroupController extends Controller
{
    /**
     * Récupère tout les groupes et retourne la vue permettant de les afficher
     * 
     */
    public function index()
    {
        $groups = Group::orderBy('libelle')->paginate(30);

        return view('group.index', compact('groups'));
    }

    /**
     * Affiche la vue permettant de créer un groupe
     * 
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Sauvegarder un nouveau groupe dans la base
     * 
     */
    public function store()
    {
        $group = new Group();

        $group->libelle = request('libelle');

        $group->save();

        Session::flash('message', 'Groupe créé avec succès !');

        return redirect()->route('groups.index');
    }

    /**
     * Affiche la vue affichant un groupe
     * 
     */
    public function show($id)
    {
        $group = Group::find($id);

        $query = DB::table('individus')
        ->select('individus.id as ind_id', 'nom', 'prenom', 'prenom', 'appartenances.id as app_id')
        ->join('appartenances', 'individus.id', '=', 'appartenances.individu_id')
        ->where('appartenances.groupe_id', '=', $id)
        ->get();

        return view('group.show', [
            'group' => $group,
            'query' => $query
        ]);
    }

    /**
     * Affiche la vue permettant d'editer un groupe
     * 
     */
    public function edit($id)
    {
        $group = Group::find($id);

        return view('group.edit', compact($group));
    }
    
    /**
     * Met à jour un groupe spécifique
     * 
     */
    public function update($id)
    {
        $group = Group::find($id);
        
        $group->libelle = request('libelle');

        $group->save();

        Session::flash('message', 'Groupe modifié avec succès !');

        return redirect()->route('groups.index');
    }

    /**
     * Supprime un groupe spécifique
     * 
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        Session::flash('message', "Groupe supprimé avec succès !");

        return redirect()->route('groups.index');
    }
}
