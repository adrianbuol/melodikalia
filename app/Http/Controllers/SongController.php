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
        return view('songs.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genres = Genre::all();
        try {
            $song = new Song;
            $song->name = $request->songName;
            $song->user_id = $request->userId;
            $path = $request->file('musicFile')->store('/songs', 'public');
            $song->song_path = $path;
            $song->genre_id = $request->genre;
            $song->save();

            $message = "<div id='msgOk' class='msg alert alert-success w-50 mt-4'>
            <p>¡Canción subida correctamente!</p></div>";
        } catch (\Throwable $th) {
            $message = "<div id='msgError' class='msg alert alert-danger w-50 mt-4'>
                <p>Error creando canción: Introduce un nombre correcto.</p></div>";
        }
        return view('songs.create', compact(['message', 'genres']));
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
        $author = $song->user;
        $songName = $song->name;
        $genre = Genre::get()->where('id', $song->genre_id)->value('name');

        $numLikes = $song->likes->count();
        $likes = false;
        if (session('user') == null) {
            return view('songs.show', compact('song', 'songPath', 'songName', 'author', 'genre', 'likes', 'numLikes'));
        } else {
            $sessionUser = session('user');
            $likes = $song->likes->find($sessionUser->id) ? true : false;
            return view('songs.show', compact('song', 'songPath', 'songName', 'author', 'genre', 'likes', 'numLikes'));
        }
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
        $genres = Genre::all();
        try {
            $song = Song::find($id);
            $songPath = $song->song_path;
            $song->name = $request->songName;
            if ($request->hasFile('musicFile')) {
                // Borrar imagen vieja
                $oldPath = $song->song_path;
                Storage::disk('public')->delete($oldPath);

                // Actualizar imagen
                $path = $request->file('musicFile')->store('/songs', 'public');
                $songPath = $path;
            }
            $song->genre_id = $request->genre;
            $song->save();
        } catch (\Throwable $th) {
            $message = "<div id='msgError' class='msg alert alert-danger w-50 mt-4'>
                <p>Error creando canción: Introduce un nombre correcto.</p></div>";
            return view('songs.edit', compact('song', 'songPath', 'genres'));
        }
        return redirect("songs/$song->id");
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

    public function addToAlbum(Request $request)
    {
        $song = Song::find($request->song_id);
        $song->albums()->attach($request->album_id);
    }

    public function doLike(Song $song)
    {
        $sessionUser = session('user');
        $song->likes()->attach($sessionUser->id);
        return redirect("songs/$song->id");
    }

    public function doDislike(Song $song)
    {
        $sessionUser = session('user');
        $song->likes()->detach($sessionUser->id);
        return redirect("songs/$song->id");
    }
}
