<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <h4>Perfil</h4>
        <h6>ID: <span> {{ $user->id }}</span> </h6>
        <h6>Username: <span> {{ $user->username }}</span> </h6>
        <h6>Email: <span> {{ $user->email }}</span> </h6>
        <h6>Name: <span>{{ $user->name }}</span> </h6>
        <h6>Surname: <span>{{ $user->surname }}</span> </h6>
        <h6>Avatar: </h6>
        <img src="{{ $imgPath }}" alt="{{ $user->username }} avatar" />
        <div class="d-flex">
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
    @endsection

</body>

</html>
