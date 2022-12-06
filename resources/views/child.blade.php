@extends('layouts.app')

@section('content')
    <div class="row border-bottom">
        <h2>TOP - 5</h2>
    </div>

    {{-- Canciones top --}}
    <div class="row border d-flex justify-content-center align-items-center">
        @foreach ($allSongs as $song)
            <div class="d-flex flex-column justify-content-center align-items-center col-2 border p-3 m-2">
                <h4>
                    <a href="/songs/{{ $song->id }}">{{ $song->name }}</a>
                </h4>
                <audio controls class="w-100">
                    <source src="/storage/{{ $song->song_path }}" type="audio/mp3">
                </audio>
                <h5>{{ $song->user_id }}</h5>
                <h6>{{ $song->genre_id }}</h6>
                <p>Likes - <span>{{ $song->likes->count() }}</span></p>
            </div>
        @endforeach
    </div>


    <div class="row border-bottom mt-5 mb-5"></div>
    <div class="row border-bottom">
        <h2>Ultimas Subidas</h2>
    </div>

    {{-- Canciones ultimas --}}
    <div class="row border d-flex justify-content-center align-items-center">
        @foreach ($latestSongs as $song)
            <div class="d-flex flex-column justify-content-center align-items-center col-2 border p-3 m-2">
                <h4>
                    <a href="/songs/{{ $song->id }}">{{ $song->name }}</a>
                </h4>
                <audio controls class="w-100">
                    <source src="/storage/{{ $song->song_path }}" type="audio/mp3">
                </audio>
                <h5>{{ $song->user_id }}</h5>
                <h6>{{ $song->genre_id }}</h6>
                <p>Likes - <span>{{ $song->likes->count() }}</span></p>
            </div>
        @endforeach
    </div>
    <div class="row border-bottom mt-5"></div>
@endsection
