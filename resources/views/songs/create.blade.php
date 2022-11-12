<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Subir una canción</h3>
            <form class="d-flex flex-column align-items-center" action="/songs/store" method="post">
                @csrf
                <label for="songName">Nombre</label>
                <input type="text" name="songName">
                <label for="genre">Genero</label>
                <select name="genre">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <!-- De momento solo archivos ".mp3" -->
                <input type="file" name="musicFile" accept="audio/mp3">

                <button type="submit" name="submit">Subir</button>
            </form>
        </main>
    @endsection
</body>

</html>
