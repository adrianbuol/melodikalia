<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    /**
     *
     * Devuelve la vista de página landing
     */
    public function landing()
    {
        return view('child');
    }

    /**
     *
     * Devuelve la vista de admin, donde se visualiza el CRUD
     */
    public function admin()
    {
        return view('/admin/admin');
    }
}
