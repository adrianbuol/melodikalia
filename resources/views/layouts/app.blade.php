<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <link href="{{ asset('css/header.css') }}" rel="stylesheet">

    <title>Melodikalia</title>
</head>

<body class="h-100">
    <header class="d-flex justify-content-md-between align-items-center">
        <a href="/" class="border border-dark col-2 d-flex justify-content-center">Home</a>

        {{-- @if (session('user'))
            <h5>Bienvenido: {{ session('user')->name }}</h5>
        @endif --}}

        <a href="/admin" class="border border-dark col-2 d-flex justify-content-center">Admin</a>
        <a href="/songs/create" class="border border-dark col-2 d-flex justify-content-center">Subir
            Archivo</a>

        {{-- Botón perfil --}}
        <div class="dropdown">
            <a class="btn btn-secondary " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Usuario
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item border-bottom" href="/profile">Perfil</a>
                <a class="dropdown-item border-bottom" href="/like">Me gusta</a>
                <a class="dropdown-item border-bottom" href="/following">Sigo</a>
                <a class="dropdown-item border-bottom" href="/followers">Me siguen</a>
            </div>
        </div>
        @if (session('user'))
            <a href="/logout" class="border border-dark col-2 d-flex justify-content-center">Cerrar Sesion</a>
        @else
            <a href="/users/create" class="border border-dark col-2 d-flex justify-content-center">Registrarse</a>
            <a href="/login/view" class="border border-dark col-2 d-flex justify-content-center">Iniciar Sesion</a>
        @endif

    </header>


    <div class="container container border border-dark mt-5 p-5 h-50">

        @yield('content')
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>
