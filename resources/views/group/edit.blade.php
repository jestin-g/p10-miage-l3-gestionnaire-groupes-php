@extends('layouts.app')

@section('content')
<h1 class="display-3">
    Modifier un groupe
</h1>
<div class="card">
  <div class="card-header">{{ __($group->libelle) }}</div>

  <div class="card-body">

    <form method="POST" action="{{ route('groups.update', $group->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Libelle') }}</label>

            <div class="col-md-6">
                <input id="libelle" type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ $group->libelle }}" required autocomplete="libelle" autofocus>

                @error('libelle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
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