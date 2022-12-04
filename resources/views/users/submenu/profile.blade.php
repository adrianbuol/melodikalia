@vite(['resources/css/profile.css'])
@vite(['resources/css/list.css'])
@vite(['resources/js/profile.js'])
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <h4>Perfil</h4>
        <div id="parent">
            <div id="avatar"
                class="m-2 p-2 border border-dark d-flex flex-column justify-content-center align-items-center">
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
            <div id="buttons" class="d-flex justify-content-left align-items-center border border-dark m-2">
                @if (session('user')->id == $user->id || session('user')->admin)
                    <form class="m-1" action="/users/{{ $user->id }}/edit" method="GET">
                        @csrf
                        <input type="submit" value="Editar">
                    </form>
                    <form class="m-1" action="/users/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                @endif
            </div>
        </div>

        <div id="buttons-songs-albums">
            <button id="song-list" class="mr-2">Canciones</button>
            <button id="album-list" class="mr-2">Albums</button>
            <a id="btnCreateAlbum" href="/albums/create" class="border border-dark d-flex justify-content-center">Nuevo
                Album</a>
        </div>

        {{-- Canciones User --}}
        <table id="songs-user" class="w-100">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Autor</td>
                <td>Song</td>
                <td>Genre</td>
                <td>Created At</td>
                <td>Updated At</td>
                <td colspan="2"></td>
            </tr>
            @if ($userSongs->isEmpty())
                <tr class="tableRow">
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td><a href=""><i class="bi bi-pencil-square"></i></a></td>
                    <td><a href=""><i class="bi bi-trash"></i></a></td>
                </tr>
            @endif
            @foreach ($userSongs as $song)
                <tr class="tableRow">
                    <td>{{ $song->id }}</td>
                    <td><a href="/songs/{{ $song->id }}">{{ $song->name }}</a></td>
                    <td>
                        {{ $user->username }}
                    </td>
                    <td>
                        <audio controls>
                            <source src="/storage/{{ $song->song_path }}" type="audio/mp3">
                        </audio>
                    </td>
                    <td>
                        @foreach ($genres as $genre)
                            @if ($genre->id == $song->genre_id)
                                {{ $genre->name }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $song->created_at }}</td>
                    <td>{{ $song->updated_at }}</td>
                    <td>
                        <a id="edit" href="/songs/{{ $song->id }}/edit"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                        <form action="/songs/{{ $song->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="destroy" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{-- Albums User --}}
        <table id="albums-user" class="w-100">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Autor</td>
                <td>Cover</td>
                <td>Created At</td>
                <td>Updated At</td>
                <td colspan="2"></td>
            </tr>
            @if ($userAlbums->isEmpty())
                <tr class="tableRow">
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td>⠀⠀</td>
                    <td><a href=""><i class="bi bi-pencil-square"></i></a></td>
                    <td><a href=""><i class="bi bi-trash"></i></a></td>
                </tr>
            @endif
            @foreach ($userAlbums as $album)
                <tr class="tableRow">
                    <td>{{ $album->id }}</td>
                    <td><a href="/albums/{{ $album->id }}">{{ $album->name }}</a></td>
                    <td>
                        {{ $user->username }}
                    </td>
                    <td>
                        <img class="border border-dark" src="/storage/{{ $album->cover }}"
                            alt="{{ $album->name }} image cover" />
                    </td>
                    <td>{{ $album->created_at }}</td>
                    <td>{{ $album->updated_at }}</td>
                    <td>
                        <a id="edit" href="/albums/{{ $album->id }}/edit"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                        <form action="/albums/{{ $album->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="destroy" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        @if (session('user')->admin)
            <div class="d-flex justify-content-center">
                <a href="/users" class="back-button border border-dark d-flex justify-content-center p-2 w-25">Back to Crud</a>
            </div>
        @endif
    @endsection

</body>

</html>
