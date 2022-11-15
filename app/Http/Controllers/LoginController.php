<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{

    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        try {
            $username = $request->input('username');
            $result = DB::table('users')->where('username', $username)->get();
            if ($result[0]->username == $request->input('username') && $result[0]->password == $request->input('password')) {
                session(['user' => $username]);
                return redirect('/');
            } else {
                throw new Exception('Contraseña incorrecta.');

                return view('/login');
            }
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            $message = "<p class='text-danger'>Error de inicio de sesion: $errorMessage</p>";

            return view('/login', compact(['message']));
        }


        // if (DB::table('users')->where('username', $request->username)->exists()) {
        //     $user = new User();
        //     $user->name = $request->username;

        //     if (password_verify('password', $user->password)) {
        //         session(['user' => $user]);
        //         return redirect('/');
        //     } else {
        //         return view('/login');
        //     }
        // } else {
        //     return view('/login');
        // }
    }
}
