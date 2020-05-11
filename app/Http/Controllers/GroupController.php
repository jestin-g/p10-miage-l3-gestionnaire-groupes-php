<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;

use App\Exports\GroupExport;
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
    public function show($id, $annee)
    {
        $group = Group::find($id);

        $query = DB::table('individus')
            ->select('individus.id as ind_id', 'nom', 'prenom', 'appartenances.id as app_id')
            ->join('appartenances', 'individus.id', '=', 'appartenances.individu_id')
            ->where('appartenances.groupe_id', '=', $id)
            ->where('appartenances.annee', $annee.'-01-01')
            ->orderBy('nom', 'asc')
            ->get();

        return view('group.show', [
            'group' => $group,
            'query' => $query,
            'annee_affichee' => $annee
        ]);
    }

    /**
     * Affiche la vue permettant d'editer un groupe
     * 
     */
    public function edit($id)
    {
        $group = Group::find($id);

        return view('group.edit', compact('group'));
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
        $appartenances = Appartenance::where('groupe_id', $id);
        $appartenances->delete();

        $group = Group::find($id);
        $group->delete();

        Session::flash('message', "Le groupe a bien été supprimé !");

        return redirect()->route('groups.index');
    }

    /**
     * Return the specified group as JSON
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOne($id, $annee)
    {
        $groups = DB::table('individus')
            ->join('appartenances', 'individus.id', '=', 'appartenances.individu_id')
            ->where('appartenances.groupe_id', '=', $id)
            ->where('appartenances.annee', '=', $annee.'-01-01')
            ->get();
        return response()->json($groups);
    }

    /**
     * Affiche la vue affichant le formulaire d'exportation
     * 
     */
    public function export()
    {
        $groups = Group::orderBy('libelle', 'asc')->get();

        return view('group.export', compact('groups'));
    }

    /**
     * Exporter en Excel le groupe
     * 
     */
    public function export_group()
    {
        $id = request('groupe_id');
        $annee = request('annee');
        $group = Group::find($id);

        return (new GroupExport($id, $annee))->download($group->libelle.'_'.$annee.'_'.($annee+1).'.xlsx');
    }
}
