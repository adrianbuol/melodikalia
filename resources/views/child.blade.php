@vite(['resources/css/landing.css'])

@extends('layouts.app')

@section('content')
    <div class="row border-bottom w-50 mb-3">
        <h2>TOP - 5</h2>
    </div>

    {{-- Canciones top --}}
    <div class="row d-flex justify-content-center align-items-center">
        @foreach ($topSongs as $song)
            <div
                class="cancion-landing cancion{{ $songPageNum++ }} d-flex flex-column justify-content-center align-items-center col-2 border border-dark p-3 m-2">
                <h4>
                    <a href="/songs/{{ $song->id }}">{{ $song->name }}</a>
                </h4>
                <h5>@foreach ($allUsers as $user)
                        @if ($user->id == $song->user_id)
                            {{ $user->username }}
                        @endif
                    @endforeach
                </h5>

                <h6>
                    @foreach ($allGenres as $genre)
                        @if ($genre->id == $song->genre_id)
                            {{ $genre->name }}
                        @endif
                    @endforeach
                </h6>
                <p>Likes - <span>{{ $song->likes->count() }}</span></p>
            </div>
        @endforeach
    </div>


    <div class="row border-bottom mt-5 mb-5"></div>

    <div class="row border-bottom w-50 mb-3">
        <h2>Ultimas Subidas</h2>
    </div>

    {{-- Canciones ultimas --}}
    <div class="row d-flex justify-content-center align-items-center">
        @foreach ($latestSongs as $song)
            <div
                class="cancion-landing cancion{{ $songPageNum++ }} d-flex flex-column justify-content-center align-items-center col-2 border border-dark p-3 m-2">
                <h4>
                    <a href="/songs/{{ $song->id }}">{{ $song->name }}</a>
                </h4>
                <h5>
                    @foreach ($allUsers as $user)
                        @if ($user->id == $song->user_id)
                            {{ $user->username }}
                        @endif
                    @endforeach
                </h5>

                <h6>
                    @foreach ($allGenres as $genre)
                        @if ($genre->id == $song->genre_id)
                            {{ $genre->name }}
                        @endif
                    @endforeach
                </h6>
                <p>Likes - <span>{{ $song->likes->count() }}</span></p>
            </div>
        @endforeach
    </div>
    <div class="row border-bottom mt-5"></div>
@endsection
