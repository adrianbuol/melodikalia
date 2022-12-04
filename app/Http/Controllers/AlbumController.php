<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAlbums = Album::all();
        return view('admin.album', compact('allAlbums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
            $album = new Album;
            $album->user_id = session('user')->id;
            $album->name = $request->name;
            $path = $request->file('cover')->store('/images/covers', 'public');
            $album->cover = $path;
            $album->save();
            return redirect('/');
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            $message = "<p class='text-danger'>Error creando canción: $errorMessage</p>";

            return view('albums.create', compact(['message']));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $coverPath = Storage::url($album->cover);
        $albumSongs = $album->songs;
        $author = User::get()->where('id', $album->user_id)->value('username');
        $trackNum = 1;
        return view('albums.show', compact('album', 'coverPath', 'albumSongs', 'author', 'trackNum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $coverPath = Storage::url($album->cover);
        return view('albums.edit', compact('album', 'coverPath'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        $album->name = $request->name;

        if ($request->hasFile('cover')) {
            $oldPath = $album->cover;
            Storage::disk('public')->delete($oldPath);

            $path = $request->file('cover')->store('/images/covers', 'public');
            $album->cover = $path;
        }
        $album->save();
        $coverPath = Storage::url($album->cover);

        return view('albums.show', compact('album', 'coverPath'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        // Borrar archivo imagen
        $path = $album->cover;
        Storage::disk('public')->delete($path);
        // Borrar Album
        $album->delete();
        return redirect('/');
    }

    /**
     * Lista todos los albumes por usuario
     *
     */
    public function list(User $user)
    {
        return $user->albums;
    }
}
