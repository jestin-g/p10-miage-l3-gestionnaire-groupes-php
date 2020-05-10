<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                    @yield('content')
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="list-group">
                                <a class="list-group-item list-group-item-primary" disabled>Individus</a>
                                <a href="{{ url('individus') }}" class="list-group-item list-group-item-action">Liste des individus</a>
                                <a href="{{ url('individus/create') }}" class="list-group-item list-group-item-action">Créer un individu</a>
                                <a href="{{ url('search') }}" class="list-group-item list-group-item-action">Rechercher un individu</a>

                                <a class="list-group-item list-group-item-primary" disabled>Groupes</a>
                                <a href="{{ url('groups') }}" class="list-group-item list-group-item-action">Liste des groupes</a>
                                <a href="{{ url('groups/create') }}" class="list-group-item list-group-item-action">Créer un groupe</a>
                                <a href="{{ url('appartenances/create') }}" class="list-group-item list-group-item-action">Ajouter un individu à un groupe</a>
                                
                                <a class="list-group-item list-group-item-primary" disabled>Exportation</a>
                                <a href="{{ url('export') }}" class="list-group-item  list-group-item-action">Exporter un groupe</a>
                                <a href="{{ url('fichier/export_xls') }}" class="list-group-item  list-group-item-action">Exporter tous les individus (xls)</a>
                                <a href="{{ url('fichier/export_csv') }}" class="list-group-item  list-group-item-action">Exporter tous les individus (csv)</a>

                            </div>
                        </div>
                        @if (Session::has('message'))
                            @if (Session::has('danger'))
                            <div class="alert alert-danger mt-2">{{ Session::get('message') }}</div>
                            @else
                            <div class="alert alert-success mt-2">{{ Session::get('message') }}</div>
                            @endif
                       @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
