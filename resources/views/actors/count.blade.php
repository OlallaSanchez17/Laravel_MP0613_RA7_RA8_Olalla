<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteo de Actores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container">
@include('partials.header')

@yield('content')
<h1>{{ $title }}</h1>

@if($count == 0)
    <font color="red">No se ha encontrado ningún actor</font>
@else
    <h2>{{ $count }}</h2> 
@endif
    <div class="mt-5">
        <a href="/actors" class="btn btn-secondary">Volver al Listado de Actores</a>
        <a href="/" class="btn btn-secondary">Volver al Inicio</a>
    </div>
@include('partials.footer')

@yield('content')
</body>
</html>
