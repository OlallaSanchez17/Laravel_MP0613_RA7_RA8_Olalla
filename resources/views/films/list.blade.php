<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Películas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
</head>
<body class="container">
@include('partials.header')

@yield('content')


<h1>{{$title}}</h1>

@if(empty($films))
    <FONT COLOR="red">No se ha encontrado ninguna película</FONT>
@else
    <div align="center">
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Año</th>
            <th>Género</th>
            <th>País</th>
            <th>Duración</th>
            <th>Imagen</th>
        </tr>

        @foreach($films as $film)
            <tr>
                <td>{{$film['name']}}</td>
                <td>{{$film['year']}}</td>
                <td>{{$film['genre']}}</td>
                <td>{{$film['country']}}</td>
                <td>{{$film['duration']}}</td>

                <td><img src={{$film['img_url']}} style="width: 100px; height: 120px;" /></td>
            </tr>
        @endforeach
    </table>
        <div class="mt-5">
            <a href="/films" class="btn btn-secondary">Volver al Listado de Películas</a>
            <a href="/" class="btn btn-secondary">Volver al Inicio</a>
        </div>
    @include('partials.footer')
    </div>
@endif

    @yield('content')
</body>
</html>
