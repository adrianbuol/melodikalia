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
                    <h1>Crear nuevo género</h1>
                    @isset($message)
                        <div class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset

                    <form class="d-flex flex-column align-items-center" action="/genres" method="post">
                        @csrf
                        <label for="name">Introduce nombre para el genero</label>
                        <input type="text" name="name">
                        <div class="d-flex justify-content-center">
                            <button class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25"
                                id="button-sub" type="submit" name="submit">Añadir</button>
                            <button class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25"
                                id="button-res" type="reset">Reiniciar</button>
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
