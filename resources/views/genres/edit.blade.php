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
                    <h1>Modificar Género</h1>
                    @isset($message)
                        <div class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset

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

                    <div class="back-button d-flex justify-content-center">
                        <a href="/genres" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
