<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('/css/song.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <h4>Canción</h4>
        <div id="parent">
            <div id="song"
                class="m-2 p-2 border border-dark d-flex flex-column justify-content-center align-items-center">
                <h6>{{ $songName }} </h6>
                <audio controls>
                    <source src="{{ $songPath }}" type="audio/mp3">
                </audio>
            </div>
            <div id="info" class="m-2 p-2 border border-dark">
                <div class="campo">
                    <h6>Nombre de Pista: </h6>
                    <p> {{ $songName }}</p>
                </div>
                <div class="campo">
                    <h6>Autor: </h6>
                    <p> {{ $author }}</p>
                </div>
                <div class="campo">
                    <h6>Genero: </h6>
                    <p>{{ $genre }}</p>
                </div>
            </div>
            <div id="buttons" class="d-flex m-2 p-2 border border-dark">
                <form class="m-1" action="/songs/{{ $song->id }}/edit" method="GET">
                    @csrf
                    <input type="submit" value="Editar">
                </form>
                <form class="m-1" action="/songs/{{ $song->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar">
                </form>
            </div>
        </div>
        @if (session('user')->admin == 1)
            <div class="d-flex justify-content-center">
                <a href="/admin" class="border border-dark d-flex justify-content-center p-2 w-25">Back</a>
            </div>
        @endif
    @endsection

</body>

</html>
