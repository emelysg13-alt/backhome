<!DOCTYPE html>
<html>
<head>
    <title>Backhome Cliente</title>
</head>
<body>

    <nav>

    <a href="/cliente/dashboard">Inicio</a>

    <a href="/perfil">Mi perfil</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">
            Cerrar sesión
        </button>
    </form>

</nav>
    <hr>

    @yield('contenido')

</body>
</html>