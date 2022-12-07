@vite(['resources/css/landing.css'])

@extends('layouts.app')

@section('content')
    <div class="row border-bottom border-dark w-50 mb-3">
        <h2>TOP - 5</h2>
    </div>

    {{-- Canciones top --}}
    <div class="row d-flex justify-content-center align-items-center">
        @foreach ($allSongs as $song)
            <div
                class="cancion-landing d-flex flex-column justify-content-center align-items-center col-2 border border-dark p-3 m-2">
                <h4>
                    <a href="/songs/{{ $song->id }}">{{ $song->name }}</a>
                </h4>
                <h5>Por: @foreach ($allUsers as $user)
                        @if ($user->id == $song->user_id)
                            {{ $user->username }}
                        @endif
                    @endforeach
                </h5>

                <h6>{{ $song->genre_id }}</h6>
                <p>Likes - <span>{{ $song->likes->count() }}</span></p>
            </div>
        @endforeach
    </div>


    <div class="row border-bottom border-dark mt-5 mb-5"></div>

    <div class="row border-bottom border-dark w-50 mb-3">
        <h2>Ultimas Subidas</h2>
    </div>

    {{-- Canciones ultimas --}}
    <div class="row d-flex justify-content-center align-items-center">
        @foreach ($latestSongs as $song)
            <div
                class="cancion-landing d-flex flex-column justify-content-center align-items-center col-2 border border-dark p-3 m-2">
                <h4>
                    <a href="/songs/{{ $song->id }}">{{ $song->name }}</a>
                </h4>
                <h5>Por:
                    @foreach ($allUsers as $user)
                        @if ($user->id == $song->user_id)
                            {{ $user->username }}
                        @endif
                    @endforeach
                </h5>

                <h6>{{ $song->genre_id }}</h6>
                <p>Likes - <span>{{ $song->likes->count() }}</span></p>
            </div>
        @endforeach
    </div>
    <div class="row border-bottom border-dark mt-5"></div>
@endsection
