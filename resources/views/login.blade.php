@vite(['resources/css/login.css'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        {{-- <main>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>Iniciar Sesion</h3>
                @isset($message)
                    <div class="p-3">
                        {!! $message !!}
                    </div>
                @endisset
                <form action="/login" class="d-flex flex-column align-items-center" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="username">Usuario</label>
                    <input type="text" name="username">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <button type="submit" name="submit" class="mt-4">Entrar</button>
                </form>
            </div>
        </main> --}}

        <main>
            <div class="wrapper">
                <div class="container">
                    <h1>Iniciar Sesion</h1>
                    @isset($message)
                        <div class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset
                    <form action="/login" method="post" class="form" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">

                        <button type="submit" name="submit" id="login-button">Entrar</button>
                    </form>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
