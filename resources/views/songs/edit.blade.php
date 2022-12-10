@vite(['resources/css/register.css'])
@vite(['resources/css/login.css'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <div class="wrapper">
                <div class="container">
                    <h1>Modificar Canción</h1>
                    @isset($message)
                        <div class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset

                    <form class="d-flex flex-column align-items-center" action="/songs/{{ $song->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <label for="songName">Nombre de Canción: </label>
                        <input type="text" name="songName" value="{{ $song->name }}">

                        <select class="mt-2" name="genre">
                            @foreach ($genres as $genre)
                                @if ($song->genre_id == $genre->id)
                                    <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                                @else
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        <!-- De momento solo archivos ".mp3" -->
                        <label for="musicFile">Archivo de audio</label>
                        <input type="file" id="musicFile" name="musicFile" accept="audio/mp3"
                            value="{{ $song->song_path }}">

                        <div id="div8" class="d-flex justify-content-center">
                            <button type="submit" name="submit"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Actualizar</button>
                            <button type="reset"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Reiniciar</button>
                        </div>
                    </form>
                    <div class="back-button d-flex justify-content-center">
                        <a href="/songs/{{ $song->id }}"
                            class="border border-dark d-flex justify-content-center p-2 w-25">Back</a>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
