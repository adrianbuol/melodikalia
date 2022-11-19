<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $username = $request->input('username');
            $password = $request->input('password');
            $user = User::where('username', $username)->where('password', $password)->firstOrFail();

            session(['user' => $user]);
            return redirect('/');
        } catch (\Throwable $th) {
            $message = "<p class='text-danger'>Error de inicio de sesion: El nombre de usuario o la contraseña son incorrectos.</p>";

            return view('/login', compact(['message']));
        }
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }
}
