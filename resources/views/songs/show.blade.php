@vite(['resources/css/song.css'])
@vite(['resources/css/profile.css'])
@vite(['resources/js/song.js'])
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                    <p> {{ $author->username }}</p>
                </div>
                <div class="campo">
                    <h6>Genero: </h6>
                    <p>{{ $genre }}</p>
                </div>
                <div class="campo">
                    <h6>Nº Likes:</h6>
                    <p>666</p>
                </div>
                <div id="campo-likes">
                    <a href="#" id="like"><i class="bi bi-heart"></i></a>
                    <a href="#" id="remove-like"><i class="bi bi-heart-fill"></i></a>
                </div>
            </div>
            <div id="buttons" class="d-flex m-2 p-2 border border-dark">
                <button class="m-1" id="add-to-album" data-user-id="{{ $author->id }}">
                    <i class="bi bi-plus-circle mr-2"></i>
                    <span>Album</span>
                </button>

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
        <div id="back-buttons" class="d-flex m-2 p-2 border border-dark">
            <div class="back-button d-flex justify-content-center">
                <a href="/users/{{ $song->user_id }}"
                    class="border border-dark d-flex justify-content-center p-2 w-25">Back</a>
            </div>
            @if (session('user')->admin)
                <div class="back-button d-flex justify-content-center">
                    <a href="/songs" class="border border-dark d-flex justify-content-center p-2 w-25">Back to crud</a>
                </div>
            @endif
        </div>
        <div id="add-to-album-modal">
            <h2>Añadir canción al Album</h2>
            <select id="lista-albumes"></select>
            <div class="d-flex">
                <button id="cerrar-album-modal" class="mr-2">Cancelar</button>
                <button id="aceptar-album-modal" class="mr-2" data-song-id="{{ $song->id }}">Añadir</button>
            </div>

        </div>
    @endsection

</body>

</html>
