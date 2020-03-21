@extends('layouts.app')

@section('content')
<h1 class="display-3">
    Afficher un groupe
</h1>
<div class="card">
  <div class="card-header">{{ __($group->libelle) }}</div>
  <div class="card-body">
    <table class="table table-sm table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th colspan="3" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($query as $key => $record)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $record->nom }}</td>
          <td>{{ $record->prenom }}</td>
          <td><a href="{{ url('individus/'.$record->ind_id) }}" class="btn btn-success btn-sm" role="button" style="color: white;">afficher</a></td>
          <td>
            <form action="{{route('appartenances.destroy',[$record->app_id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-info btn-sm" style="color: white;">retirer</button>               
             </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection