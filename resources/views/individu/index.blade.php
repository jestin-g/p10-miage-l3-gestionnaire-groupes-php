@extends('layouts.app')

@section('content')
            <h1 class="display-3">Liste des individus</h1>
            <table class="table table-sm table-hover ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($individus as $key => $individu)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $individu->nom }}</td>
                    <td>{{ $individu->prenom }}</td>
                    <td>{{ $individu->email }}</td>
                    <td>{{ $individu->statut->libelle }}</td>
                    <td>
                      <form action="{{route('individus.destroy',[$individu->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">X</button>               
                       </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $individus->links() }}
@endsection