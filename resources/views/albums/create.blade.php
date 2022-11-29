<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Crear Album</h3>

            @isset($message)
                <div class="p-3">
                    {!! $message !!}
                </div>
            @endisset

            <form class="d-flex flex-column align-items-center" action="/albums" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="name">Nombre del Album</label>
                <input type="text" name="name">

                <label for="cover">Cover</label>
                <input type="file" name="cover" accept="image/png, image/jpeg">

                <div class="d-flex">
                    <button type="submit" name="submit">Registro</button>
                    <button type="reset">Reiniciar</button>
                </div>
            </form>

            {{-- Añadir si admin, boton visible --}}
            @if (session('user')->admin == 1)
                <div class="d-flex justify-content-center">
                    <a href="/admin" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
    {{-- <script type="text/javascript" src="{{ URL::asset('js/form.js') }}"></script> --}}
</body>

</html>
