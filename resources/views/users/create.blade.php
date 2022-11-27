<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Crear Usuario</h3>

            @isset($message)
                <div class="p-3">
                    {!! $message !!}
                </div>
            @endisset

            <form class="d-flex flex-column align-items-center" action="/users" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="userName">Nombre de usuario</label>
                <input type="text" name="userName">

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
                <label for="confirmPassword">Confirma Contraseña</label>
                <input type="password" name="confirmPassword" id="confirmPassword">

                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" accept="image/png, image/jpeg">

                <label for="email">E-Mail</label>
                <input type="email" name="email">

                <label for="name">Nombre</label>
                <input type="text" name="name">
                <label for="surname">Apellidos</label>
                <input type="text" name="surname">

                <div class="d-flex">
                    <button type="submit" name="submit">Registro</button>
                    <button type="reset">Reiniciar</button>
                </div>
            </form>

            {{-- Añadir si admin, boton visible --}}
            @if (session('user')->admin == 1)
                <div class="d-flex justify-content-center">
                    <a href="/admin" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
    {{-- <script type="text/javascript" src="{{ URL::asset('js/form.js') }}"></script> --}}
</body>

</html>
