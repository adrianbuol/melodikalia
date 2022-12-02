<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Crear nuevo género</h3>

            @isset($message)
                <div class="p-3">
                    {!! $message !!}
                </div>
            @endisset

            <form class="d-flex flex-column align-items-center" action="/genres" method="post">
                @csrf
                <label for="name">Introduce nombre para el genero</label>
                <input type="text" name="name">
                <div class="d-flex">
                    <button id="buttonSub" type="submit" name="submit">Añadir</button>
                    <button id="buttonRes" type="reset">Reiniciar</button>
                </div>
            </form>

            <div id="backButton" class="d-flex justify-content-center">
                <a href="/admin" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
            </div>
        </main>
    @endsection
</body>

</html>
