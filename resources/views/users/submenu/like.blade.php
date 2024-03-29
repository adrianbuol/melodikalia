@vite(['resources/css/list.css'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <h1>Canciones que me gustan</h1>
        <div>
            <table>
                <tr class="tableRow">
                    <td>Name</td>
                    <td>Autor</td>
                    <td>Song</td>
                    <td>Genre</td>
                </tr>
                @foreach ($like as $song)
                    <tr class="tableRow">
                        <td><a href="/songs/{{ $song->id }}">{{ $song->name }}</a></td>
                        <td>
                            @foreach ($allUsers as $user)
                                @if ($user->id == $song->user_id)
                                    {{ $user->username }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <audio controls>
                                <source src="/uploads/{{ $song->song_path }}" type="audio/mp3">
                            </audio>
                        </td>
                        <td>
                            @foreach ($allGenres as $genre)
                                @if ($genre->id == $song->genre_id)
                                    {{ $genre->name }}
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
</body>

</html>
