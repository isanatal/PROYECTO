<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Mi Aplicación</title>
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

    <!-- Contenido principal -->
    <main>
        <section class="hero">
            <h1>Bienvenido a Mi Aplicación Day ღ </h1>
            <p>Gestiona tus productos, clientes y facturas con facilidad.</p>
        </section>
        <section class="content">
            <p>Más contenido aquí...</p>
        </section>
    </main>

</body>
</html>

