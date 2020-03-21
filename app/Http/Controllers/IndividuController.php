<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
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
     * Affiche la vue permettant de créer un individu
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

        return redirect()->route('individus.show', $individu->id);
    }

    /**
     * Affiche la vue affichant un individu
     * 
     */
    public function show($id)
    {
        $individu = Individu::find($id);

        return view('individu.show', compact('individu'));
    }

    /**
     * Affiche la vue permettant d'editer un individu
     * 
     */
    public function edit($id)
    {
        $individus = Individu::find($id);
        $annuaires = Annuaire::all();
        $statuts = Statut::all();

        return view('individu.edit', [
            'individu' => $individus,
            'annuaires' => $annuaires,
            'statuts' => $statuts
        ]);
    }
    
    /**
     * Met à jour un individu spécifique
     * 
     */
    public function update($id)
    {
        $individu = Individu::find($id);
        
        $individu->nom = request('nom');
        $individu->prenom = request('prenom');
        $individu->email = request('email');
        $individu->num = request('num');
        $individu->statut_id = request('statut');
        $individu->annuaire_id = request('annuaire');

        $individu->save();

        Session::flash('message', 'Individu modifié avec succès !');

        return redirect()->route('individus.show', $individu->id);
    }

    /**
     * Supprime un individu spécifique
     * 
     */
    public function destroy($id)
    {
        $individu = Individu::find($id);
        $individu->delete();

        Session::flash('message', "Individu supprimé avec succès !");

        return redirect()->route('individus.index');
    }

    /**
     * Retourne la vue permettant de rechercher un individu
     * 
     */
    public function search()
    {
        return view('individu.search');
    }

    /**
     * Requête Ajax appellée lors de la recherche
     * 
     */
    public function searchAjax(Request $request)
    {
        if ($request->ajax())
        {
            $output = "";
            $individus = DB::table('individus')->where('nom', 'LIKE', '%'.$request->search.'%')->get();

            if ($individus)
            {
                foreach ($individus as $key => $individu)
                {
                    $output .= '<tr>'.
                    '<td>'.$individu->nom.'</td>'.
                    '<td>'.$individu->prenom.'</td>'.
                    '<td>'.$individu->email.'</td>'.
                    '<td>'.'<a href="'.url('individus/'.$individu->id.'/edit').'" class="btn btn-info btn-sm" role="button" style="color: white;">modifier</a>'.'</td>'.
                    '<td>'.'<form action="'.route('individus.destroy',[$individu->id]).'" method="POST">'.method_field('DELETE').' '.'<input type="hidden" name="_token" value="'.csrf_token().'">'.'<button type="submit" class="btn btn-danger btn-sm">suppr.</button></form>'.
                    '</tr>';
                }
                return Response ($output);
            }
        }
    }




}
