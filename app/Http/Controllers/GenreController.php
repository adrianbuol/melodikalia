<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allGenres = Genre::all();
        return view('admin.genre', compact('allGenres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genres.create');
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
            $genre = new Genre;
            $genre->name = $request->name;
            $genre->save();
            $message = "<p class='text-success'>¡Nuevo genero creado correctamente!</p>";
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            $message = "<p class='text-danger'>Error creando un nuevo genero: $errorMessage</p>";
        }
        return view('genres.create', compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        $allSongs = Song::all();
        // $author = User::get()->where('id', $song->user_id)->value('username');
        return view('genres.show', compact('genre', 'allSongs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->name = $request->genreName;
        $genre->save();
        $message = "<p class='text-success'>¡Genero actualizado correctamente!</p>";

        return view('admin.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect('/');
    }
}
