<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Modificar Usuario</h3>
            <form class="d-flex flex-column align-items-center" action="/users/{{ $user->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <label for="userName">Nombre de usuario</label>
                <input type="text" name="userName" value="{{ $user->username }}">

                <label for="email">E-Mail</label>
                <input type="email" name="email" value="{{ $user->email }}">

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" value="{{ $user->password }}">

                {{-- <label for="confirmPassword">Confirma Contraseña</label>
                <input type="password" name="confirmPassword" id="confirmPassword"> --}}

                <label for="name">Name: </label>
                <input type="text" name="name" value="{{ $user->name }}">

                <label for="surname">Surname: </label>
                <input type="text" name="surname" value="{{ $user->surname }}">

                <label for="avatar">Avatar</label>
                <img src="{{ $imgPath }}" alt="{{ $user->username }} avatar" />
                <input type="file" name="avatar" accept="image/png, image/jpeg" value="{{ $user->profile_pic }}">

                <div class="d-flex">
                    <button type="submit" name="submit">Actualizar</button>
                    <button type="reset">Reiniciar</button>
                </div>
            </form>
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
