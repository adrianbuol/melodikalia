<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($post)
    {
        $posts = [
            'mi-primer-post' => 'Hola buenas tardes',
            'mi-segundo-post' => 'Hola cararararaarara',
        ];

        if (!array_key_exists($post, $posts)) {
            abort(404, 'Ese post no ha sido encontrado.');
        }

        return view('post', [
            'post' => $posts[$post]
        ]);
    }
}
