<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Appartenance;
use App\Individu;
use App\Group;

class AppartenanceController extends Controller
{
    /**
     * Affiche le formulaire permettant de créer une appartenance
     * 
     */
    public function create()
    {
        $individus = Individu::orderBy('nom')->get();
        $groups = Group::orderBy('libelle')->get();

        return view('appartenance.create', [
            'individus' => $individus,
            'groups' => $groups
        ]);
    }

    /**
     * Enregistre une appartenance
     * 
     */
    public function store()
    {
        $appartenance = new Appartenance();

        $appartenance->individu_id = request('individu');
        $appartenance->groupe_id = request('group');
        $appartenance->annee = request('annee');

        $verification = Appartenance::where('individu_id', $appartenance->individu_id)
                            ->where('groupe_id', $appartenance->groupe_id)
                            ->where('annee', $appartenance->annee)
                            ->first();
        
        if ($verification)
        {
            Session::flash('danger', 1);
            Session::flash('message', 'Individu déjà présent dans ce groupe !');
        } else {
            $appartenance->save();
            Session::flash('message', 'Individu ajouté à un groupe avec succès !');
        }

        return redirect()->route('groups.show2', [
            'id' => $appartenance->groupe_id,
            'annee' => \Carbon\Carbon::parse($appartenance->annee)->format('Y')
        ]);
    }

    /**
     * Supprime une appartenance
     * 
     */
    public function destroy($id)
    {
        $appartenance = Appartenance::find($id);

        $id_group = $appartenance->groupe_id;

        $appartenance->delete();

        return redirect()->route('groups.show2', [
            'id' => $id_group,
            'annee' => \Carbon\Carbon::parse($appartenance->annee)->format('Y')
        ]);
    }
}
