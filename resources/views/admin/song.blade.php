<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>CRUD - SONGS</h3>
                <div class="d-flex justify-content-md-between align-items-center p-3 w-75">
                    <a href="/songs/create" class="border border-dark col-2 d-flex justify-content-center">Create</a>

                </div>
                <div class="d-flex justify-content-center align-items-center ">
                    <table class="m-4">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Autor</td>
                            <td>Song</td>
                            <td>Genre</td>
                            <td>Created At</td>
                            <td>Updated At</td>
                            <td colspan="3"></td>
                        </tr>
                        @foreach ($allSongs as $song)
                            <tr>
                                <td>{{ $song->id }}</td>
                                <td>{{ $song->name }}</td>
                                <td>
                                    @foreach ($allUsers as $user)
                                        @if ($user->id == $song->user_id)
                                            {{ $user->username }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <audio controls>
                                        <source src="/storage/{{ $song->song_path }}" type="audio/mp3">
                                    </audio>
                                </td>
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
                                    <form action="/songs/{{ $song->id }}" method="GET">
                                        @csrf
                                        <input type="submit" value="Read">
                                    </form>
                                </td>
                                <td>
                                    <form action="/songs/{{ $song->id }}/edit" method="GET">
                                        @csrf
                                        <input type="submit" value="Update">
                                    </form>
                                </td>
                                <td>
                                    <form action="/songs/{{ $song->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <a href="/admin" class="border border-dark col-2 d-flex justify-content-center">Back</a>
            </div>

        </main>
    @endsection
</body>

</html>
