@extends('layouts.app')

@section('content')
<h1 class="display-3">
    Afficher un groupe
</h1>
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col">
        {{ __($group->libelle) }}
      </div>
      <div class="col text-right">
        <form id="form_annee">
          <select id="annee" name="annee" class="custom-select col-md-6" onchange="createActionUrl()">
              @php
                  $annee_en_cours = \Carbon\Carbon::now()->format('Y');
              @endphp
          @for ($annee = $annee_en_cours; $annee > 2000; $annee--)
          <option <?php if ($annee_affichee == $annee) { echo('selected="selected"'); } ?> value="{{ $annee }}">{{ $annee.'-'.($annee+1) }}</option>
          @endfor
          </select>
          @error('annee')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </form>
      </div>
    </div>
  </div>
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
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
<script>
function createActionUrl()
{
  let urlRecupere = "<?php echo(url('groups/'.$group->id)); ?>";
  let annee = $('#annee option:selected').val();
  urlRecupere = urlRecupere + '/' + annee;
  $('#form_annee').attr('action', urlRecupere);
  $('#form_annee').submit();
}
</script>
@endsection