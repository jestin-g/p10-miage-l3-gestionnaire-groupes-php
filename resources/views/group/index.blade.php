@extends('layouts.app')

@section('content')
<h1 class="display-3">Liste des groupes</h1>
<table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Libellé</th>
      <th colspan="3">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($groups as $key => $group)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $group->libelle }}</td>
      <td><a href="{{ url('groups/'.$group->id.'/'.\Carbon\Carbon::now()->format('Y')) }}" class="btn btn-success btn-sm" role="button" style="color: white;">afficher</a></td>
      <td><a href="{{route('groups.edit', $group->id)}}" class="btn btn-info btn-sm" role="button" style="color: white;">modifier</a></td>
      <td>
        <form action="{{route('groups.destroy',[$group->id])}}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">suppr.</button>               
          </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
  {{ $groups->links() }}
@endsection