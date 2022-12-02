<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
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

                {{-- <label for="confirmPassword">Confirma Contraseña</label>
                <input type="password" name="confirmPassword" id="confirmPassword"> --}}

                <label for="avatar">Avatar</label>
                {{-- <label for="avatar"><i id="iconUpload" class="bi bi-cloud-upload"></i></label> --}}
                <input id="imgFile" type="file" name="avatar" accept="image/png, image/jpeg">

                <label for="email">E-Mail</label>
                <input type="email" name="email">

                <label for="name">Nombre</label>
                <input type="text" name="name">
                <label for="surname">Apellidos</label>
                <input type="text" name="surname">

                <div class="d-flex">
                    <button id="buttonSub" type="submit" name="submit">Registro</button>
                    <button id="buttonRes" type="reset">Reiniciar</button>
                </div>
            </form>

            <div id="backButton" class="d-flex justify-content-center">
                <a href="/" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
            </div>

        </main>
    @endsection
    {{-- <script type="text/javascript" src="{{ URL::asset('js/form.js') }}"></script> --}}
</body>

</html>
