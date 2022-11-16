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

            @isset($message)
                <div class="p-3">
                    {!! $message !!}
                </div>
            @endisset

            <form class="d-flex flex-column align-items-center" action="/songs/store" method="post"
                enctype="multipart/form-data">
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

                <input type="hidden" name="userId" value="{{ session('user')->id }}">
                <button type="submit" name="submit">Subir
                    Audio</button>
            </form>

            {{-- Añadir si admin, boton visible --}}
            <a href="/song" class="border border-dark col-2 d-flex justify-content-center">Back</a>
        </main>
    @endsection
</body>

</html>
