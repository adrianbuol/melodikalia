@vite(['resources/css/header.css'])
@vite(['resources/css/app.css'])
@vite(['resources/js/app.js'])
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('/images/icons/favicon.ico') }}">
    <title>Melodikalia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
    <header>
        <nav class="d-flex justify-content-center align-items-center">
            <div id="home">
                <a href="/" class="border border-dark col-2 d-flex justify-content-center">Home</a>
                {{-- <a href="/" class="border border-dark col-2 d-flex justify-content-center">Feed</a> --}}
                @if (session('user'))
                    @php
                        $user = session('user');
                    @endphp
                    <h5>Bienvenido: {{ $user->name }}</h5>
                @endif
            </div>

            <div id="menu">
                {{-- Si user es administrador --}}
                @if (session('user'))
                    @if ($user->admin == 1)
                        <a href="/admin" class="border border-dark col-2 d-flex justify-content-center">Admin</a>
                    @endif

                    <a href="/songs/create" class="border border-dark col-2 d-flex justify-content-center">Subir
                        Archivo</a>

                    {{-- Botón perfil --}}
                    <div class="dropdown">
                        <a class="btn btn-secondary " href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuario
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item border-bottom" href="/users/{{ $user->id }}">Perfil</a>
                            <a class="dropdown-item border-bottom" href="/like/{{ $user->id }}">Me gusta</a>
                            <a class="dropdown-item border-bottom" href="/following/{{ $user->id }}">Sigo</a>
                            <a class="dropdown-item border-bottom" href="/followers/{{ $user->id }}">Me siguen</a>
                        </div>
                    </div>
                    <a href="/logout" class="border border-dark col-2 d-flex justify-content-center">Cerrar Sesion</a>
                @else
                    <a href="/users/create"
                        class="border border-dark col-2 d-flex justify-content-center">Registrarse</a>
                    <a href="/login" class="border border-dark col-2 d-flex justify-content-center">Iniciar
                        Sesion</a>
                @endif
            </div>
        </nav>
    </header>


    {{-- <div class="container container border border-dark mt-5 mb-2 p-5"> --}}
    <div class="p-5">

        @yield('content')
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>
