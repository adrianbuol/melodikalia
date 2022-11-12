<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Melodikalia</title>
</head>

{{-- Añadir a CSS cuando empiece a aplicar estilos --}}
<style>
    header {
        height: 40px;
    }
</style>

<body>
    <header class="d-flex justify-content-md-between align-items-center p-3">
        <a href="/" class="border border-dark col-2 d-flex justify-content-center">Home</a>
        <a href="/admin" class="border border-dark col-2 d-flex justify-content-center">Admin</a>
        <a href="{{ route('songs.create') }}" class="border border-dark col-2 d-flex justify-content-center">Subir
            Archivo</a>
        {{-- Botón perfil --}}
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
        <a href="#" class="border border-dark col-2 d-flex justify-content-center">Logout</a>
    </header>


    <div class="container">

        @yield('content')
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</body>

</html>
