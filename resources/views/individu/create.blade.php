@extends('layouts.app')

@section('content')
<h1 class="display-3">
    Créer un individu
</h1>
<div class="card">
  <div class="card-header">{{ __('Nouvel individu') }}</div>

  <div class="card-body">

    <form method="POST" action="{{ route('individus.store') }}">
        @csrf

        <div class="form-group row">
            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

            <div class="col-md-6">
                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

            <div class="col-md-6">
                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="num" class="col-md-4 col-form-label text-md-right">{{ __('Numéro') }}</label>

            <div class="col-md-6">
                <input id="num" type="text" class="form-control @error('num') is-invalid @enderror" name="num" value="{{ old('num') }}" required autocomplete="num" autofocus>

                @error('num')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="annuaire" class="col-md-4 col-form-label text-md-right">{{ __('Annuaire') }}</label>
            <select id="annuaire" name="annuaire" class="custom-select col-md-6">
                @foreach ($annuaires as $key => $annuaire)
            <option value="{{ $annuaire->id }}">{{ $annuaire->libelle }}</option>
                @endforeach
              </select>
              @error('annuaire')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group row">
            <label for="statut" class="col-md-4 col-form-label text-md-right">{{ __('Statut') }}</label>
            <select id="statut" name="statut" class="custom-select col-md-6">
                @foreach ($statuts as $key => $statut)
            <option value="{{ $statut->id }}">{{ $statut->libelle }}</option>
                @endforeach
              </select>
              @error('statut')
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
@endsection