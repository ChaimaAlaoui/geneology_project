<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Généalogie Application')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @unless(request()->is('login')) 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('people.index') }}">Généalogie Application</a>

            <div class="ms-auto d-flex">
                <a href="{{ route('people.index') }}" class="btn btn-link text-dark me-2">Gérer les Personnes</a>
                <a href="{{ route('degree.form') }}" class="btn btn-link text-dark">Calculer Degré de Parenté</a>
                
                @if(Auth::check()) 
                    <form action="{{ route('logout') }}" method="POST" class="d-inline ms-3">
                        @csrf
                        <button type="submit" class="btn btn-danger">Se déconnecter</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
    @endunless

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
