@extends('layouts.app')

@section('content')
<h1 class="display-3">
    Ajouter un individu à un groupe
</h1>
<div class="card">
  <div class="card-header">{{ __('Nouvelle liaison') }}</div>

  <div class="card-body">

    <form method="POST" action="{{ route('appartenances.store') }}">
        @csrf
        <div class="form-group row">
            <label for="individu" class="col-md-4 col-form-label text-md-right">{{ __('Individu') }}</label>
            <select id="individu" name="individu" class="custom-select col-md-6">
                @foreach ($individus as $key => $individu)
            <option value="{{ $individu->id }}">{{ $individu->nom.' '.$individu->prenom }}</option>
                @endforeach
              </select>
              @error('individu')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group row">
            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Groupe') }}</label>
            <select id="group" name="group" class="custom-select col-md-6">
                @foreach ($groups as $key => $group)
            <option value="{{ $group->id }}">{{ $group->libelle }}</option>
                @endforeach
              </select>
              @error('group')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group row">
            <label for="annee" class="col-md-4 col-form-label text-md-right">{{ __('Année') }}</label>
            <select id="annee" name="annee" class="custom-select col-md-6">
                {{ $annee_en_cours = \Carbon\Carbon::now()->format('Y') }}
            @for ($annee = $annee_en_cours; $annee > 2000; $annee--)
            <option value="{{ \Carbon\Carbon::parse("$annee-01-01") }}">{{ $annee.'-'.($annee+1) }}</option>
            @endfor
            </select>
            @error('annee')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Enregistrer') }}
                </button>
            </div>
        </div>
    </form>
    
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</script>
<script>
    function matchCustom(params, data) {

    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
    }

    // `params.term` should be the term that is used for searching
    // `data.text` is the text that is displayed for the data object
    if (data.text.indexOf(params.term) > -1) {
      var modifiedData = $.extend({}, data, true);

      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
    }

    // Return `null` if the term should not be displayed
    return null;
}
    $("#individu").select2({
        matcher: matchCustom
    });
</script>
@endsection