@extends('layouts.app')

@section('content')
<h1 class="display-3">
    Exporter un groupe
</h1>
<div class="card">
  <div class="card-header">{{ __('Exporter') }}</div>

  <div class="card-body">

    <form method="POST" action="{{ route('export_xls') }}">
        @csrf
        @method('GET')
        <div class="form-group row">
            <label for="groupe_id" class="col-md-4 col-form-label text-md-right">{{ __('Groupe') }}</label>
            <select id="groupe_id" name="groupe_id" class="custom-select col-md-6">
                @foreach ($groups as $key => $group)
            <option value="{{ $group->id }}">{{ $group->libelle }}</option>
                @endforeach
              </select>
              @error('grgroupe_idoup')
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
            <option value="{{ $annee }}">{{ $annee.'-'.($annee+1) }}</option>
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
                    {{ __('Exporter') }}
                </button>
            </div>
        </div>
    </form>
    
  </div>
</div>
@endsection