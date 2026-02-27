@include('partials.header')

@yield('content')

<link rel="stylesheet" href="{{ asset('css/list.css') }}">

<h1>{{$title}}</h1>

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
                <td>{{$actor['birth_date']}}</td>
                <td>{{$actor['country']}}</td>
                <td><img src="{{$actor['img_url']}}" style="width: 100px; height: 120px;" /></td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        <a href="/" class="btn btn-primary">Volver al Inicio</a>
    </div>
    @include('partials.footer')

    @yield('content')
</div>
@endif
