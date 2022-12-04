@vite(['resources/css/form.css'])
@vite(['resources/js/form.js'])
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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

            <form class="d-flex flex-column align-items-center" action="/songs" method="POST" enctype="multipart/form-data">
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
                <label id="label-music-file" for="musicFile"><i id="iconUpload" class="bi bi-cloud-upload"></i></label>
                <input type="file" id="musicFile" name="musicFile" accept="audio/mp3" required>

                <input type="hidden" name="userId" value="{{ session('user')->id }}">
                <button id="buttonSub" type="submit" name="submit">Subir
                    Audio</button>
            </form>
            @if (session('user')->admin)
                <div class="back-button d-flex justify-content-center">
                    <a href="/songs" class="border border-dark d-flex justify-content-center p-2 w-25">Back to Crud</a>
                </div>
            @else
                <div class="back-button d-flex justify-content-center">
                    <a href="/" class=" border border-dark d-flex justify-content-center p-2 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
</body>

</html>
