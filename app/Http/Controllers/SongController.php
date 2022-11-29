<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSongs = Song::all();
        $allUsers = User::all();
        $allGenres = Genre::all();
        return view('admin.song', compact('allSongs', 'allGenres', 'allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('songs.create', compact(["genres"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $song = new Song;
            $song->name = $request->songName;
            $song->user_id = $request->userId;
            $path = $request->file('musicFile')->store('/songs', 'public');
            $song->song_path = $path;
            $song->genre_id = $request->genre;
            $song->save();

            return redirect('/');
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            $message = "<p class='text-danger'>Error creando canción: $errorMessage</p>";

            return view('songs.create', compact(['message']));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        $songPath = Storage::url($song->song_path);
        $author = User::get()->where('id', $song->user_id)->value('username');
        $songName = $song->name;
        $genre = Genre::get()->where('id', $song->genre_id)->value('name');

        return view('songs.show', compact('song', 'songPath', 'songName', 'author', 'genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $songPath = Storage::url($song->song_path);
        $genres = Genre::all();
        return view('songs.edit', compact('song', 'songPath', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        $song->name = $request->songName;
        if ($request->hasFile('musicFile')) {
            // Borrar imagen vieja
            $oldPath = $song->song_path;
            Storage::disk('public')->delete($oldPath);

            // Actualizar imagen
            $path = $request->file('musicFile')->store('/songs', 'public');
            $song->song_path = $path;
        }
        $song->genre_id = $request->genre;
        $song->save();

        $songPath = Storage::url($song->song_path);
        $author = User::get()->where('id', $song->user_id)->value('username');
        $songName = $song->name;
        $genre = Genre::get()->where('id', $song->genre_id)->value('name');

        return view('songs.show', compact('song', 'songPath', 'songName', 'author', 'genre'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        // Borrar archivo audio
        $path = $song->song_path;
        Storage::disk('public')->delete($path);
        // Borrar Cancion
        $song->delete();
        return redirect('/');
    }
}
