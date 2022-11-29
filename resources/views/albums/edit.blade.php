<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Modificar Album</h3>
            <form class="d-flex flex-column align-items-center" action="/albums/{{ $album->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

                <label for="name">Nombre del Album</label>
                <input type="text" name="name" value="{{ $album->name }}">

                <label for="cover">Album Cover</label>
                <img class="h-25" src="{{ $coverPath }}" alt="{{ $album->name }} album cover" />
                <input type="file" name="cover" accept="image/png, image/jpeg" value="{{ $album->cover }}">

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
