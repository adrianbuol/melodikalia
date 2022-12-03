@vite(['resources/css/form.css'])
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
            <h3>Crear Album</h3>

            @isset($message)
                <div class="p-3">
                    {!! $message !!}
                </div>
            @endisset

            <form class="d-flex flex-column align-items-center" action="/albums" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="name">Nombre del Album</label>
                <input type="text" name="name">

                <label>Cover</label>
                <label id="label-file" for="imgFile"><i id="iconUpload" class="bi bi-cloud-upload"></i></label>
                <input type="file" id="imgFile" name="imgFile" accept="image/png, image/jpeg">


                <button id="buttonSub" type="submit" name="submit">Registrar</button>
            </form>

            {{-- Añadir si admin, boton visible --}}
            @if (session('user')->admin)
                <div id="backButton" class="d-flex justify-content-center">
                    <a href="/admin" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
                </div>
            @else
                <div id="backButton" class="d-flex justify-content-center">
                    <a href="/users/{{ session('user')->id }}"
                        class="border border-dark d-flex justify-content-center p-2 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
</body>

</html>
