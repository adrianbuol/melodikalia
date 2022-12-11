@vite(['resources/css/register.css'])
@vite(['resources/css/login.css'])
@vite(['resources/js/register.js'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <div class="wrapper">
                <div class="container">
                    <h1>Registro de Usuario</h1>
                    @isset($message)
                        <div id="message" class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset

                    <form id="form-reg" action="/users" class="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="div1">
                            <label for="userName">Nombre de Usuario</label>
                            <input type="text" name="userName" placeholder="Nombre de Usuario">
                        </div>
                        <div id="div2">
                            <label for="email">Correo Electronico</label>
                            <input type="email" name="email" placeholder="Correo Electronico">
                        </div>
                        <div id="div3">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="Contraseña">
                        </div>
                        <div id="div4">
                            <label for="confirmPassword">Repite la Contraseña</label>
                            <input type="password" name="confirmPassword" id="confirm-password"
                                placeholder="Repite la Contraseña">
                        </div>
                        <div id="div5">
                            <label for="avatar">Imagen de Perfil</label>
                            <input id="img-file-usr" type="file" name="avatar" accept="image/png, image/jpeg">
                        </div>
                        <div id="div6">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" placeholder="Nombre">
                        </div>
                        <div id="div7">
                            <label for="surname">Apellidos</label>
                            <input type="text" name="surname" placeholder="Apellidos">
                        </div>
                        <div id="div8" class="d-flex justify-content-center">
                            <button id="button-sub" type="submit" name="submit"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Registro</button>
                            <button id="button-res" type="reset"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Reiniciar</button>
                        </div>
                    </form>
                    <div class="back-button d-flex justify-content-center">
                        <a href="/" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
