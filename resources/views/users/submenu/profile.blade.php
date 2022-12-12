@vite(['resources/css/profile.css'])
@vite(['resources/css/list.css'])
@vite(['resources/js/profile.js'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <h4>Perfil</h4>
        <div id="parent-profile">
            <div id="avatar" class="m-2 p-2 d-flex flex-column justify-content-center align-items-center">
                <img src="{{ $imgPath }}" alt="{{ $user->username }} avatar" />
            </div>
            <div id="info-profile" class="m-2 p-2">
                <div class="campo">
                    <h6>Nombre de Usuario: </h6>
                    <p> {{ $user->username }}</p>
                </div>
                <div class="campo">
                    <h6>Email: </h6>
                    <p> {{ $user->email }}</p>
                </div>
                <div class="campo">
                    <h6>Nombre: </h6>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="campo">
                    <h6>Apellidos: </h6>
                    <p>{{ $user->surname }}</p>
                </div>
            </div>
            <div id="buttons" class="d-flex justify-content-left align-items-center m-2">
                @if (session('user'))
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
                @endif

            </div>
            <div id="follows" class="d-flex justify-content-left align-items-center m-2">
                <div class="d-flex">
                    <a class="follow-link" href="/followers/{{ $user->id }}">
                        <h4 class="m-3">Seguidores: <span>{{ $numFollowers }}</span></h4>
                    </a>
                    <a class="follow-link" href="/following/{{ $user->id }}">
                        <h4 class="m-3">Seguidos: <span>{{ $numFollows }}</span></h4>
                    </a>
                </div>

                <div class="d-flex justify-content-left align-items-center">
                    @if (session('user'))
                        @if (session('user')->id == $user->id)
                        @endif
                        @if (session('user')->id != $user->id)
                            @if (!$follows)
                                <a href="/users/follow/{{ $user->id }}" class="follow" id="do-follow">Seguir</a>
                            @else
                                <a href="/users/unfollow/{{ $user->id }}" class="unfollow follow">Dejar de Seguir</a>
                            @endif
                        @endif
                    @endif

                </div>
            </div>
        </div>

        <div id="buttons-songs-albums">
            <button id="song-list" class="mr-2">Canciones</button>
            <button id="album-list" class="mr-2">Albums</button>


            @if (session('user'))
                @if (session('user')->id == $user->id)
                    <a id="btnCreateAlbum" href="/albums/create"
                        class="border border-dark d-flex justify-content-center">Nuevo
                        Album</a>
                @endif
            @endif

        </div>
        <div class="container-table">
            {{-- Canciones User --}}
            <table id="songs-user" class="w-100">
                <tr>
                    <td>Name</td>
                    <td>Autor</td>
                    <td>Genero</td>
                    <td>Fecha Creación</td>
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
                    </tr>
                @endif
                @foreach ($userSongs as $song)
                    <tr class="tableRow">
                        <td><a href="/songs/{{ $song->id }}">{{ $song->name }}</a></td>
                        <td>
                            <a href="/users/{{ $user->id }}">{{ $user->username }}</a>
                        </td>
                        {{-- <td>
                        <audio controls>
                            <source src="/storage/{{ $song->song_path }}" type="audio/mp3">
                        </audio>
                    </td> --}}
                        <td>
                            @foreach ($genres as $genre)
                                @if ($genre->id == $song->genre_id)
                                    {{ $genre->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $song->created_at }}</td>
                        @if (session('user'))
                            @if (session('user')->id == $user->id || session('user')->admin)
                                <td>
                                    <a id="edit" href="/songs/{{ $song->id }}/edit"><i
                                            class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <form action="/songs/{{ $song->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button id="destroy" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="container-table">
            {{-- Albums User --}}
            <table id="albums-user" class="w-100">
                <tr>
                    <td>Nombre</td>
                    <td>Autor</td>
                    <td>Caratula</td>
                    <td>Fecha Creación</td>
                    <td colspan="2"></td>
                </tr>
                @if ($userAlbums->isEmpty())
                    <tr class="tableRow">
                        <td>⠀⠀</td>
                        <td>⠀⠀</td>
                        <td>⠀⠀</td>
                        <td>⠀⠀</td>
                        <td>⠀⠀</td>
                        <td>⠀⠀</td>
                    </tr>
                @endif
                @foreach ($userAlbums as $album)
                    <tr class="tableRow">
                        <td><a href="/albums/{{ $album->id }}">{{ $album->name }}</a></td>
                        <td>
                            {{ $user->username }}
                        </td>
                        <td> 
                            <img class="border border-dark" src="/uploads/{{ $album->cover }}"
                                alt="{{ $album->name }} image cover" />
                        </td>
                        <td>{{ $album->created_at }}</td>

                        @if (session('user'))
                            @if (session('user')->id == $user->id || session('user')->admin)
                                <td>
                                    <a id="edit" href="/albums/{{ $album->id }}/edit"><i
                                            class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <form action="/albums/{{ $album->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button id="destroy" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>

        @if (session('user'))
            @if (session('user')->admin)
                <div class="d-flex justify-content-center mt-2">
                    <a href="/users" class="back-button border border-dark d-flex justify-content-center p-2 w-25">Back to
                        Crud</a>
                </div>
            @endif
        @endif
    @endsection

</body>

</html>
