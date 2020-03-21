@extends('layouts.app')

@section('content')
<h1 class="display-3">
    Afficher un individu
</h1>
<div class="card">
  <div class="card-header">{{ __($individu->nom.' '.$individu->prenom) }}</div>
  <div class="card-body">
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Champs</th>
            <th scope="col">Valeur</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Nom</td>
            <td>{{ $individu->nom }}</td>
          </tr>
          <tr>
            <td>Prénom</td>
            <td>{{ $individu->prenom }}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{ $individu->email }}</td>
          </tr>
          <tr>
            <td>Numéro</td>
            <td>{{ $individu->num }}</td>
          </tr>
          <tr>
            <td>Statut</td>
            <td>{{ $individu->statut->libelle }}</td>
          </tr>
          <tr>
            <td>Annuaire</td>
            <td>{{ $individu->annuaire->libelle }}</td>
          </tr>
          <tr>
            <td>Dernière modification</td>
            <td>{{ \Carbon\Carbon::parse($individu->updated_at)->format('j F, Y') }}</td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
<div class="card mt-2">
    <div class="card-header">Actions</div>
    <div class="card-body">
        <div>
            <a href="{{ url('individus/'.$individu->id.'/edit') }}" class="btn btn-info" role="button" style="color: white; width: 100%;">Modifier</a>
        </div>
        <div class="mt-2">
            <form action="{{route('individus.destroy',[$individu->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" style="width: 100%">Supprimmer</button>               
            </form>
        </div>
    </div>
</div>
@endsection