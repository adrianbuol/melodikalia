@vite(['resources/css/register.css'])
@vite(['resources/css/login.css'])
@vite(['resources/js/register.js'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <div class="wrapper user-edit modify">
                <div class="container">
                    <h1>Modificar Usuario</h1>
                    @isset($message)
                        <div id="message" class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset

                    <form id="form-reg" action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div id="div1">
                            <label for="userName">Nombre de usuario</label>
                            <input type="text" name="userName" value="{{ $user->username }}">
                        </div>
                        <div id="div2">
                            <label for="email">E-Mail</label>
                            <input type="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div id="div3">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" value="{{ $user->password }}">
                        </div>
                        <div id="div4">
                            <label for="confirmPassword">Confirma Contraseña</label>
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                value="{{ $user->password }}">
                        </div>
                        <div id="div5">
                            <label for="avatar">Avatar</label>
                            <label for="avatar"><img id="img-modify"src="{{ $imgPath }}"
                                    alt="{{ $user->username }} avatar" /></label>
                            <input type="file" name="avatar" accept="image/png, image/jpeg"
                                value="{{ $user->profile_pic }}">
                        </div>
                        <div id="div6">
                            <label for="name">Name: </label>
                            <input type="text" name="name" value="{{ $user->name }}">
                        </div>
                        <div id="div7">
                            <label for="surname">Surname: </label>
                            <input type="text" name="surname" value="{{ $user->surname }}">
                        </div>
                        <div id="div8" class="d-flex justify-content-center">
                            <button type="submit" name="submit"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Actualizar</button>
                            <button type="reset"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Reiniciar</button>

                        </div>
                    </form>
                    @if (session('user')->id == $user->id || session('user')->admin)
                        <div class="d-flex justify-content-center">
                            {{-- <a href="/admin" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a> --}}
                            <a class="back-button border border-dark d-flex justify-content-center p-2"
                                href="/users/{{ $user->id }}">Back</a>
                        </div>
                    @endif
                </div>
            </div>
            </div>
        </main>
    @endsection
</body>

</html>
