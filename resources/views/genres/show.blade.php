<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('/css/song.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <h5>Canciones del Genero</h5>
        <div id="parent">
            <div id="song"
                class="m-2 p-2 border border-dark d-flex flex-column justify-content-center align-items-center">
                <table class="m-4">
                    <tr>
                        <td class="col-4">Name</td>
                        <td class="col-8">Song</td>
                    </tr>
                    @foreach ($allSongs as $song)
                        @if ($song->genre_id == $genre->id)
                            <tr class="tableRow">
                                <td class="col-4"><a href="/songs/{{ $song->id }}">{{ $song->name }}</a></td>
                                <td class="col-8">
                                    <audio controls>
                                        <source src="/storage/{{ $song->song_path }}" type="audio/mp3">
                                    </audio>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>


            </div>
            <div id="info" class="m-2 p-2 border border-dark">
                <div class="campo">
                    <h6>Nombre del Genero: </h6>
                    <p> {{ $genre->name }}</p>
                </div>
            </div>
            <div id="buttons" class="d-flex m-2 p-2 border border-dark">
                <form class="m-1" action="/genres/{{ $genre->id }}/edit" method="GET">
                    @csrf
                    <input type="submit" value="Editar">
                </form>
                <form class="m-1" action="/genres/{{ $genre->id }}" method="POST">
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
