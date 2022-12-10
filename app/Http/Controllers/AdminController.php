<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use App\Models\User;


class AdminController extends Controller
{
    /**
     *
     * Devuelve la vista de página landing
     */
    public function landing()
    {
        $latestSongs = Song::latest('created_at')->take(5)->get();
        $songs = Song::all();
        $allGenres = Genre::all();
        $allUsers = User::all();
        // $numLikes = $songs->likes;
        $allSongs = $songs->take(5);
        $songPageNum = 1;

        return view('child', compact('latestSongs', 'allSongs', 'allGenres', 'allUsers', 'songPageNum'));
    }

    /**
     *
     * Devuelve la vista de admin, donde se visualiza el CRUD
     */
    public function admin()
    {
        if (session('user')->admin) {
            return view('/admin/admin');
        } else {
            abort(404);
        }
    }
}
