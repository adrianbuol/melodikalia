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

                <label for="cover">Cover</label>
                {{-- <label for="cover"><i id="iconUpload" class="bi bi-cloud-upload"></i></label> --}}
                <input id="imgFile" type="file" name="cover" accept="image/png, image/jpeg">

                <div class="d-flex">
                    <button id="buttonSub" type="submit" name="submit">Registro</button>
                    <button id="buttonRes" type="reset">Reiniciar</button>
                </div>
            </form>

            {{-- Añadir si admin, boton visible --}}
            @if (session('user')->admin == 1)
                <div id="backButton" class="d-flex justify-content-center">
                    <a href="/admin" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
    {{-- <script type="text/javascript" src="{{ URL::asset('js/form.js') }}"></script> --}}
</body>

</html>
