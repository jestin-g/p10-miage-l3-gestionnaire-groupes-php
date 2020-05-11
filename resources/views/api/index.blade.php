@extends('layouts.app')

@section('content')
<h1 class="display-3">Utilisation de l'API</h1>
<div class="card">
  <div class="card-header">{{ __('API') }}</div>

  <div class="card-body">
    Cette application fournie une API permettant de récupérer les individus stockés dans la base au format JSON.
    <ul>
        <li>Tout les individus: <b>http://127.0.0.1:8000/api/individu</b></li>
        <li>Un individu spécifique: <b>http://127.0.0.1:8000/api/individu/{id}</b></li>
        <li>Les individus d'un groupe: <b>http://127.0.0.1:8000/api/group/{id}/{annee}</b></li>
    </ul>  
  </div>
</div>
@endsection