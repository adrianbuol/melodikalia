<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main class="d-flex flex-column align-items-center">
            <h3>Crear nuevo género</h3>

            @isset($message)
                <div class="p-3">
                    {!! $message !!}
                </div>
            @endisset

            <form class="d-flex flex-column align-items-center" action="/genres/store" method="post">
                @csrf
                <label for="name">Introduce nombre para el genero</label>
                <input type="text" name="name">
                <div class="d-flex">
                    <button type="submit" name="submit">Añadir Genero</button>
                    <button type="reset">Reiniciar</button>
                </div>
            </form>

            <a href="/admin/genre" class="border border-dark col-2 d-flex justify-content-center">Back</a>
        </main>
    @endsection
</body>

</html>
