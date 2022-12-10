@vite(['resources/css/register.css'])
@vite(['resources/css/login.css'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <div class="wrapper modify">
                <div class="container">
                    <h1>Modificar Album</h1>
                    @isset($message)
                        <div class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset
                    <form class="d-flex flex-column align-items-center" action="/albums/{{ $album->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <label for="name">Nombre del Album</label>
                        <input type="text" name="name" value="{{ $album->name }}">

                        <label for="cover">Album Cover</label>
                        <label for="cover"><img id="img-modify" src="{{ $coverPath }}"
                                alt="{{ $album->name }} album cover" /></label>
                        <input type="file" name="cover" id="cover" accept="image/png, image/jpeg"
                            value="{{ $album->cover }}">

                        <div id="div8" class="d-flex justify-content-center">
                            <button type="submit" name="submit"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Actualizar</button>
                            <button type="reset"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Reiniciar</button>
                        </div>
                    </form>
                    <div class="back-button d-flex justify-content-center">
                        <a href="/albums/{{ $album->id }}"
                            class="border border-dark d-flex justify-content-center p-2 w-25">
                            Back </a>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
