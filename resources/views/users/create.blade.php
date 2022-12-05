@vite(['resources/css/form.css'])
@vite(['resources/css/register.css'])
@vite(['resources/js/register.js'])
@vite(['resources/js/form.js'])
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Registro de Usuario</h3>
            @isset($message)
                <div id="message" class="p-3">
                    {!! $message !!}
                </div>
            @endisset

            <form id="form-reg" action="/users" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="div1">
                    <label for="userName">Nombre de usuario</label>
                    <input type="text" name="userName">
                </div>
                <div id="div2">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email">
                </div>
                <div id="div3">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                    <label id="pass-msg" class="text-danger position-relative" for="password">Las contraseña debe tener
                        minimo
                        6 caracteres</label>
                </div>
                <div id="div4">
                    <label for="confirmPassword">Confirma Contraseña</label>
                    <input type="password" name="confirmPassword" id="confirmPassword">
                    <label id="confirm-pass-msg"class="text-danger position-relative" for="confirmPassword">Las contraseñas
                        deben coincidir</label>
                </div>
                <div id="div5">
                    <label>Avatar</label>
                    <label for="avatar"><i id="iconUpload" class="bi bi-cloud-upload"></i></label>
                    <input id="imgFileUsr" type="file" name="avatar" accept="image/png, image/jpeg" required>
                </div>
                <div id="div6">
                    <label for="name">Nombre</label>
                    <input type="text" name="name">
                </div>
                <div id="div7">
                    <label for="surname">Apellidos</label>
                    <input type="text" name="surname">
                </div>
                <div id="div8" class="d-flex justify-content-center">
                    <button id="buttonSub" type="submit" name="submit"
                        class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Registro</button>
                    <button id="buttonRes" type="reset"
                        class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Reiniciar</button>
                </div>
            </form>
            <div class="back-button d-flex justify-content-center">
                <a href="/" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
            </div>
        </main>
    @endsection
</body>

</html>
