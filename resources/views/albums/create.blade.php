@vite(['resources/css/register.css'])
@vite(['resources/css/login.css'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <div class="wrapper">
                <div class="container">
                    <h1>Crear Album</h1>
                    @isset($message)
                        <div class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset

                    <form class="d-flex flex-column align-items-center" action="/albums" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <label for="name">Nombre del Album</label>
                        <input type="text" name="name">

                        <label>Cover</label>
                        <input type="file" id="img-file" name="img-file" accept="image/png, image/jpeg">


                        <button id="buttonSub" type="submit" name="submit">Registrar</button>
                    </form>

                    {{-- Añadir si admin, boton visible --}}
                    <div class="back-button d-flex justify-content-center">
                        <a href="/users/{{ session('user')->id }}"
                            class="border border-dark d-flex justify-content-center p-2 w-25">Back</a>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
