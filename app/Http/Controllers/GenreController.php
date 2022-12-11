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
        if (session('user')->admin) {
            $allGenres = Genre::all();
            return view('admin.genre', compact('allGenres'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('user')->admin) {
            return view('genres.create');
        } else {
            abort(404);
        }
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
            $message = "<div id='msg-ok' class='msg alert alert-success w-50 mt-4'>
            <p>¡Nuevo genero creado correctamente!</p></div>
            ";
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            if (session('user')->admin) {
                $message = "<div id='msg-error' class='msg alert alert-danger w-50 mt-4'>
            <p class='text-danger'>Error creando un nuevo genero: $errorMessage</p></div>";
            } else {
                $message = "<div id='msg-error' class='msg alert alert-danger w-50 mt-4'>
            <p class='text-danger'>Error creando un nuevo genero, el nombre ya existe.</p></div>";
            }
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
        if (session('user')->admin) {
            $allSongs = Song::all();
            // $author = User::get()->where('id', $song->user_id)->value('username');
            return view('genres.show', compact('genre', 'allSongs'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        if (session('user')->admin) {
            return view('genres.edit', compact('genre'));
        } else {
            abort(404);
        }
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
        try {
            $genre = Genre::find($id);
            $genre->name = $request->genreName;
            $genre->save();

            $message = "<div id='msg-ok' class='msg alert alert-success w-50 mt-4'>
        <p>¡Genero actualizado correctamente!</p></div>";
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            if (session('user')->admin) {
                $message = "<div id='msg-error' class='msg alert alert-danger w-50 mt-4'>
        <p class='text-danger'>Error actualizando el genero: $errorMessage</p></div>";
            } else {
                $message = "<div id='msg-error' class='msg alert alert-danger w-50 mt-4'>
        <p class='text-danger'>Error actualizando el genero, el nombre ya existe.</p></div>";
            }
        }

        return view('genres.edit', compact('genre', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        try {
            $genre->delete();
        } catch (\Throwable $th) {
            $message = "<div id='msg-error' class='msg alert alert-danger w-50 mt-4'>
            <p class='text-danger'>Error de Borrado.</p>
            <p class='text-danger'>No se pueden eliminar géneros que contengan una o mas canciones.</p>
            </div>";
            return back()->with('message', $message);
        }
        return redirect('/');
    }
}
