<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Actores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
</head>
<body class="container">
@include('partials.header')

@yield('content')

<h1>{{$title}}</h1>

@if(isset($decades) && count($decades) > 0)
    <div class="mb-4">
        <h4>Filtrar por década:</h4>
        <div class="row">
        @foreach($decades as $decade)
            <div class="col-md-auto mb-2">
                <a href="{{ route('actorsByDecade', ['year' => $decade]) }}" 
                   class="btn {{ isset($selectedDecade) && $selectedDecade == $decade ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $decade }}s
                </a>
            </div>
        @endforeach
            <div class="col-md-auto mb-2">
                <a href="{{ route('allActors') }}" class="btn btn-outline-secondary">
                    Ver todos
                </a>
            </div>
        </div>
    </div>
@endif

@if(empty($actors))
    <FONT COLOR="red">No se ha encontrado ningún actor</FONT>
@else
    <div align="center">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
            <th>País</th>
            <th>Imagen</th>
        </tr>

        @foreach($actors as $actor)
            <tr>
                <td>{{$actor['id']}}</td>
                <td>{{$actor['name']}}</td>
                <td>{{$actor['birthdate']}}</td>
                <td>{{$actor['country']}}</td>
                <td><img src="{{$actor['img_url']}}" style="width: 100px; height: 120px;" /></td>
            </tr>
        @endforeach
    </table>
    <div class="mt-5">
        <a href="/actors" class="btn btn-secondary">Volver al Listado de Actores</a>
        <a href="/" class="btn btn-secondary">Volver al Inicio</a>
    </div>
    @include('partials.footer')
    </div>
@endif

    @yield('content')
</body>
</html>

