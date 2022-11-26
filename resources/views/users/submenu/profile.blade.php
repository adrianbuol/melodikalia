<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('/css/profile.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <h4>Perfil</h4>
        <div id="parent">
            <div id="avatar" class="m-2 p-2 border border-dark d-flex flex-column justify-content-center align-items-center">
                <h6>Avatar: </h6>
                <img src="{{ $imgPath }}" alt="{{ $user->username }} avatar" />
            </div>
            <div id="info" class="m-2 p-2 border border-dark">
                <div class="campo">
                    <h6>ID: </h6>
                    <p> {{ $user->id }}</p>
                </div>
                <div class="campo">
                    <h6>Username: </h6>
                    <p> {{ $user->username }}</p>
                </div>
                <div class="campo">
                    <h6>Email: </h6>
                    <p> {{ $user->email }}</p>
                </div>
                <div class="campo">
                    <h6>Name: </h6>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="campo">
                    <h6>Surname: </h6>
                    <p>{{ $user->surname }}</p>
                </div>
            </div>
            <div id="buttons" class="d-flex m-2 p-2 border border-dark">
                <form class="m-1" action="/users/{{ $user->id }}/edit" method="GET">
                    @csrf
                    <input type="submit" value="Editar">
                </form>
                <form class="m-1" action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar">
                </form>
            </div>
        </div>
    @endsection

</body>

</html>
