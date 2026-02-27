<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas y Actores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            text-align: center;
        }
        .card {
            transition: transform 0.3s;
            cursor: pointer;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .btn-big {
            font-size: 1.5rem;
            padding: 1.5rem 2rem;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-5">Bienvenido a la Gestión de Cine</h1>
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4">
                <a href="/films" class="text-decoration-none text-dark">
                    <div class="card shadow p-4 h-100">
                        <img src="{{ asset('film_icon.png') }}" class="card-img-top mx-auto" style="width: 150px; height: 150px; object-fit: contain;" alt="Películas">
                        <div class="card-body">
                            <h2 class="card-title">Películas</h2>
                            <p class="card-text">Accede al listado y gestión de películas.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-5 mb-4">
                <a href="/actors" class="text-decoration-none text-dark">
                    <div class="card shadow p-4 h-100">
                        <img src="{{ asset('actor_icon.png') }}" class="card-img-top mx-auto" style="width: 150px; height: 150px; object-fit: contain;" alt="Actores">
                        <div class="card-body">
                            <h2 class="card-title">Actores</h2>
                            <p class="card-text">Accede al listado y gestión de actores.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
