@vite(['resources/css/song.css'])
@vite(['resources/css/profile.css'])
@vite(['resources/js/song.js'])
@vite(['resources/js/reproductor.js'])
@vite(['resources/css/reproductor.css'])

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
                <div id="audio-player-container">
                    <audio src="{{ $songPath }}" preload="metadata" loop></audio>
                    <p>{{ $songName }}</p>

                    <button id="play-icon"></button>
                    <span id="current-time" class="time">0:00</span>
                    <input type="range" id="seek-slider" max="100" value="0">
                    <span id="duration" class="time">0:00</span>

                    <output id="volume-output">100</output>
                    <input type="range" id="volume-slider" max="100" value="100">
                    <button id="mute-icon"></button>
                </div>

                {{-- Viejo --}}
                {{-- <h6>{{ $songName }} </h6>
                <audio controls>
                    <source src="{{ $songPath }}" type="audio/mp3">
                </audio> --}}
            </div>

            <div id="info" class="m-2 p-2 border border-dark">
                <div class="campo">
                    <h6>Autor: </h6>
                    <a href="/users/{{ $song->user_id }}">{{ $author->username }}</a>
                </div>
                <div class="campo">
                    <h6>Genero: </h6>
                    <p>{{ $genre }}</p>
                </div>
                <div class="campo">
                    <h6>Nº Likes:</h6>
                    <p>{{ $numLikes }}</p>
                    {{-- Boton Like --}}
                    <div id="campo-likes">
                        @if (session('user'))
                            @if (!$likes)
                                <a href="/songs/like/{{ $song->id }}" id="like"><i class="bi bi-heart"></i></a>
                            @else
                                <a href="/songs/dislike/{{ $song->id }}" id="remove-like"><i
                                        class="bi bi-heart-fill"></i></a>
                            @endif
                        @else
                            <a href="" id="like"><i class="bi bi-heart"></i></a>
                        @endif
                    </div>
                </div>

            </div>

            {{-- Añadir Album --}}
            <div id="buttons" class="d-flex m-2 p-2 border border-dark">
                @if (session('user'))
                    <button class="m-1" id="add-to-album">
                        <i class="bi bi-plus-circle mr-2"></i>
                        <span>Album</span>
                    </button>
                @endif

                {{-- Botones Usuario/Admin --}}
                @if (session('user'))
                    @if (session('user')->id == $song->user_id || session('user')->admin)
                        <form class="m-1" action="/songs/{{ $song->id }}/edit" method="GET">
                            @csrf
                            <input type="submit" value="Editar">
                        </form>
                        <form class="m-1" action="/songs/{{ $song->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar">
                        </form>
                    @endif
                @endif
            </div>
        </div>
        {{-- Boton Back to User --}}
        <div id="back-buttons" class="d-flex m-2 p-2 border border-dark">
            <div class="back-button d-flex justify-content-center">
                <a href="/users/{{ $song->user_id }}"
                    class="border border-dark d-flex justify-content-center p-2 w-25">Back to User</a>
            </div>

            {{-- Boton Admin->Crud --}}
            @if (session('user'))
                @if (session('user')->admin)
                    <div class="back-button d-flex justify-content-center">
                        <a href="/songs" class="border border-dark d-flex justify-content-center p-2 w-25">Back to crud</a>
                    </div>
                @endif
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
