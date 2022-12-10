@vite(['resources/css/app.css'])
@vite(['resources/css/list.css'])
@vite(['resources/js/profile.js'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>CRUD - SONGS</h3>
                <div class="d-flex justify-content-md-between align-items-center p-3 w-75">
                    <a id="btn-create" href="/songs/create"
                        class="border border-dark col-2 d-flex justify-content-center">Create</a>

                </div>
                <div class="d-flex justify-content-center align-items-center ">
                    <table class="m-4">
                        <tr class="tableRow">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Autor</td>
                            {{-- <td>Song</td> --}}
                            <td>Genre</td>
                            <td>Created At</td>
                            <td>Updated At</td>
                            <td colspan="2"></td>
                        </tr>
                        @foreach ($allSongs as $song)
                            <tr class="tableRow">
                                <td>{{ $song->id }}</td>
                                <td><a href="/songs/{{ $song->id }}">{{ $song->name }}</a></td>
                                <td>
                                    @foreach ($allUsers as $user)
                                        @if ($user->id == $song->user_id)
                                            {{ $user->username }}
                                        @endif
                                    @endforeach
                                </td>
                                {{-- Comentado porque consume muchos recursos cargar todas las canciones --}}
                                {{-- <td class="music-player">
                                    <audio controls>
                                        <source src="/storage/{{ $song->song_path }}" type="audio/mp3">
                                    </audio>
                                </td> --}}
                                <td>
                                    @foreach ($allGenres as $genre)
                                        @if ($genre->id == $song->genre_id)
                                            {{ $genre->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $song->created_at }}</td>
                                <td>{{ $song->updated_at }}</td>
                                <td>
                                    <a href="/songs/{{ $song->id }}/edit" id="edit"><i
                                            class="bi bi-pencil-square"></i></a>
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
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="/admin" class="back-button border border-dark d-flex justify-content-center p-2 w-25">Back</a>
            </div>
        </main>
    @endsection
</body>

</html>
