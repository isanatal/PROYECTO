<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
        <!-- Barra de navegación -->
        <header>
            <nav class="navbar">
                <ul class="navbar-menu">
                    <li><a href="/products" class="navbar-item">Productos</a></li>
                    <li><a href="/clientes" class="navbar-item">Clientes</a></li>
                    <li><a href="/facturas" class="navbar-item">Factura</a></li>
                    <li><a href="/" class="navbar-item">Acceso</a></li>
                    <li><a href="/registro" class="navbar-item">Registro</a></li>
                    <a href="{{route('logout')}}" class="navbar-item">Salir</a>
                </ul>
            </nav>
        </header>
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
