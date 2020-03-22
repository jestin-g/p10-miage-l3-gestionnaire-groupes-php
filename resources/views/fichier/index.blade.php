@extends('layouts.app')

@section('content')
<h1 class="display-3">Importation de fichiers</h1>
<div class="card">
  <div class="card-header">{{ __('Importation CSV') }}</div>

  <div class="card-body">

    <form method="POST" action="{{ route('groups.store') }}">
        @csrf

        <div class="form-group row">
            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Fichier CSV') }}</label>

            <div class="col-md-6">
                <input id="fichier" type="file" class="custom-file-input" name="fichier" required autocomplete="fichier" autofocus>
                <label class="custom-file-label" for="fichier">Choisissez un fichier...</label>
                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Importer') }}
                </button>
            </div>
        </div>
    </form>
    
  </div>
</div>
@endsection