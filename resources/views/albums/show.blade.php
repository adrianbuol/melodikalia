<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('/css/song.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <h5>{{ $album->name }}</h5>
        <h6>Por {{ $album->user_id }}</h6>
        <div id="parent">
            <div id="song"
                class="m-2 p-2 border border-dark d-flex flex-column justify-content-center align-items-center">
                <img src="{{ $coverPath }}" alt="{{ $album->name }} album cover">
            </div>
            <div id="info" class="m-2 p-2 border border-dark">
                <div class="campo">
                    <h6>01 - </h6>
                    <p>Pista</p>
                </div>
                <div class="campo">
                    <h6>02 - </h6>
                    <p>Pista</p>
                </div>
            </div>
            <div id="buttons" class="d-flex m-2 p-2 border border-dark">
                <form class="m-1" action="/albums/{{ $album->id }}/edit" method="GET">
                    @csrf
                    <input type="submit" value="Editar">
                </form>
                <form class="m-1" action="/genres/{{ $album->id }}" method="POST">
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
