@vite(['resources/css/album.css'])
@vite(['resources/css/profile.css'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <h5 id="title" class="border-bottom border-dark">{{ $album->name }}</h5>
        <h6>Por {{ $author }}</h6>
        <div id="parent">
            <div id="album-cover"
                class="m-2 p-2 border border-dark d-flex flex-column justify-content-center align-items-center">
                <img src="{{ $coverPath }}" alt="{{ $album->name }} album cover">
            </div>
            <div id="songs-list" class="m-2 p-2 border border-dark">
                @foreach ($albumSongs as $song)
                    <div class="campo">
                        <h6>
                            @if ($trackNum >= 10)
                                {{ $trackNum++ }}
                            @else
                                0{{ $trackNum++ }}
                            @endif
                            -
                        </h6>
                        <h6><a href="/songs/{{ $song->id }}">{{ $song->name }}</a></h6>
                    </div>
                @endforeach
            </div>
            <div id="buttons" class="d-flex m-2 p-2 border border-dark">

                @if (session('user'))
                    @if (session('user')->id == $album->user_id || session('user')->admin)
                        <form class="m-1" action="/albums/{{ $album->id }}/edit" method="GET">
                            @csrf
                            <input type="submit" value="Editar">
                        </form>
                        <form class="m-1" action="/genres/{{ $album->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar">
                        </form>
                    @endif
                @endif

            </div>
        </div>
        <div id="back-buttons" class="d-flex m-2 p-2 border border-dark">
            <div class="back-button d-flex justify-content-center">
                <a href="/users/{{ $album->user_id }}"
                    class="border border-dark d-flex justify-content-center p-2 w-25">Back</a>
            </div>

            @if (session('user'))
                @if (session('user')->admin)
                    <div class="back-button d-flex justify-content-center">
                        <a href="/albums" class="border border-dark d-flex justify-content-center p-2 w-25">Back to Crud</a>
                    </div>
                @endif
            @endif

        </div>
    @endsection

</body>

</html>
