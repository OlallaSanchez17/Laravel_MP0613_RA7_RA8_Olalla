<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteo de Películas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container">
@include('partials.header')

@yield('content')
<h1>{{ $title }}</h1>

@if($count == 0)
    <font color="red">No se ha encontrado ninguna película</font>
@else
    <h2>{{ $count }}</h2> 
@endif
    <div class="mt-5">
        <a href="/films" class="btn btn-secondary">Volver al Listado de Películas</a>
        <a href="/" class="btn btn-secondary">Volver al Inicio</a>
    </div>
@include('partials.footer')

@yield('content')
</body>
</html>
