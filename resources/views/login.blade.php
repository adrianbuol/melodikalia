<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>Iniciar Sesion</h3>
                @isset($message)
                    <div class="p-3">
                        {!! $message !!}
                    </div>
                @endisset
                <form action="/login" class="d-flex flex-column align-items-center" method="get"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="username">Usuario</label>
                    <input type="text" name="username">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <button type="submit" name="submit">Entrar</button>
                </form>
                <a href="/" class="border border-dark col-2 d-flex justify-content-center">Back</a>
            </div>

        </main>
    @endsection
</body>

</html>
