@vite(['resources/css/form.css'])
@vite(['resources/css/register.css'])
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

                <select class="mt-2" name="genre">
                    @foreach ($genres as $genre)
                        @if ($song->genre_id == $genre->id)
                            <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                        @else
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endif
                    @endforeach
                </select>

                <label for="musicFile">Archivo de audio</label>
                <!-- De momento solo archivos ".mp3" -->
                {{-- <input type="file" name="musicFile" accept="audio/mp3"> --}}
                <label id="label-music-file" for="musicFile">
                    <i id="iconUpload" class="bi bi-cloud-upload"></i>
                </label>
                <input type="file" id="musicFile" name="musicFile" accept="audio/mp3">

                <div id="div8" class="d-flex justify-content-center">
                    <button type="submit" name="submit"
                        class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Actualizar</button>
                    <button type="reset"
                        class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Reiniciar</button>
                </div>
            </form>
            <div class="d-flex">
                <div class="d-flex justify-content-center">
                    <a href="/songs/{{ $song->id }}"
                        class="back-button border border-dark d-flex justify-content-center p-2">Back</a>
                </div>
                @if (session('user')->admin)
                    <div class="d-flex justify-content-center">
                        <a href="/songs" class="back-button border border-dark d-flex justify-content-center p-2">Back to
                            Crud</a>
                    </div>
                @endif
            </div>
        </main>
    @endsection
</body>

</html>
