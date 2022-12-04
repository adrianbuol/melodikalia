@vite(['resources/css/form.css'])
@vite(['resources/css/app.css'])
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
            <h3>Modificar Género</h3>
            <form class="d-flex flex-column align-items-center" action="/genres/{{ $genre->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

                <label for="genreName">Nombre del Genero: </label>
                <input type="text" name="genreName" value="{{ $genre->name }}">

                <div id="div8" class="d-flex justify-content-center">
                    <button type="submit" name="submit"
                        class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Actualizar</button>
                    <button type="reset"
                        class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Reiniciar</button>
                </div>
            </form>

            <div class="d-flex justify-content-center">
                <a href="/genres" class="back-button border border-dark d-flex justify-content-center p-2">Back</a>
            </div>
        </main>
    @endsection
</body>

</html>
