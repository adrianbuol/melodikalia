<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Modificar Canción</h3>
            <form class="d-flex flex-column align-items-center" action="/songs/{{ $song->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <label for="songName">Nombre de Canción: </label>
                <input type="text" name="songName" value="{{ $song->name }}">

                <select name="genre">
                    @foreach ($genres as $genre)
                        @if ($song->genre_id == $genre->id)
                            <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                        @else
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endif
                    @endforeach
                </select>

                <label for="musicFile">Input de musica</label>
                <!-- De momento solo archivos ".mp3" -->
                <input type="file" name="musicFile" accept="audio/mp3">

                <div class="d-flex">
                    <button type="submit" name="submit">Actualizar</button>
                    <button type="reset">Reiniciar</button>
                    {{-- Si admin, boton visible --}}
                </div>
            </form>
            @if (session('user')->admin == 1)
                <div class="d-flex justify-content-center">
                    <a href="/admin" class="border border-dark d-flex justify-content-center p-2 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
</body>

</html>
