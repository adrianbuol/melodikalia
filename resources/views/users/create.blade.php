@vite(['resources/css/register.css'])
@vite(['resources/css/login.css'])
@vite(['resources/js/register.js'])
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
            <div class="wrapper">
                <div class="container">
                    <h1>Registro de Usuario</h1>
                    @isset($message)
                        <div id="message" class="p-3">
                            {!! $message !!}
                        </div>
                    @endisset

                    <form id="form-reg" action="/users" class="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="div1">
                            <input type="text" name="userName" placeholder="User">
                        </div>
                        <div id="div2">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div id="div3">
                            <input type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div id="div4">
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                placeholder="Confirm Password">
                        </div>
                        <div id="div5">
                            <input id="imgFileUsr" type="file" name="avatar" accept="image/png, image/jpeg" required>
                        </div>
                        <div id="div6">
                            <input type="text" name="name" placeholder="Name">
                        </div>
                        <div id="div7">
                            <input type="text" name="surname" placeholder="Surnames">
                        </div>
                        <div id="div8" class="d-flex justify-content-center">
                            <button id="buttonSub" type="submit" name="submit"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Registro</button>
                            <button id="buttonRes" type="reset"
                                class="border border-dark d-flex justify-content-center px-5 py-2 m-2 w-25">Reiniciar</button>
                        </div>
                    </form>
                    <div class="back-button d-flex justify-content-center">
                        <a href="/" class="border border-dark d-flex justify-content-center px-5 py-2 w-25">Back</a>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
