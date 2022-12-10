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
                    <h1>Subir una canción</h1>
                    @isset($message)
                        <div class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset

                    <form class="d-flex flex-column align-items-center" action="/songs" method="POST"
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
                        <input type="file" id="music-file" name="musicFile" accept="audio/mp3" required>

                        <input type="hidden" name="userId" value="{{ session('user')->id }}">
                        <button id="buttonSub" type="submit" name="submit">Subir
                            Audio</button>
                    </form>
                    <div class="back-button d-flex justify-content-center">
                        <a href="/" class=" border border-dark d-flex justify-content-center p-2 w-25">Back</a>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
