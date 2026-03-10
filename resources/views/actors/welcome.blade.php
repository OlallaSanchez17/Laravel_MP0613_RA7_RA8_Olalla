<!DOCTYPE html>
<html lang="es">
@include('partials.header')

@yield('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Actores</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body class="container">

    <h1 class="mt-4">Gestión de Actores</h1>
    
    @if(isset($error))
        <div class="alert-popup" id="alertPopup">
            <span class="alert-text">{{ $error }}</span>
            <button class="alert-close" onclick="document.getElementById('alertPopup').style.display='none'"></button>
        </div>
    @endif

    <ul class="mt-4">
        <li><a href="{{ route('allActors') }}">Listado de todos los actores</a></li>
        <li><a href="{{ route('actorsByDecade') }}">Listado de actores por década</a></li>
        <li><a href="{{ route('countActors') }}">Conteo de actores</a></li> 
    </ul>

    <div class="mt-5">
        <a href="/" class="btn btn-secondary">Volver al Inicio</a>
    </div>

    @include('partials.footer')

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
