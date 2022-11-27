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
            <form class="d-flex flex-column align-items-center" action="/genres/{{ $genre->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

                <label for="genreName">Nombre de Canción: </label>
                <input type="text" name="genreName" value="{{ $genre->name }}">

                <div class="d-flex">
                    <button type="submit" name="submit">Actualizar</button>
                    <button type="reset">Reiniciar</button>
                </div>
            </form>
            @if (session('user')->admin == 1)
                <div class="d-flex justify-content-center">
                    <a href="/admin" class="border border-dark d-flex justify-content-center px-3 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
</body>

</html>
