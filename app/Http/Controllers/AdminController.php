<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use App\Models\User;


class AdminController extends Controller
{


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
