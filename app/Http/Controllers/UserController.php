<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers = User::all();
        return view('admin.user', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            $user = new User;
            $user->username = $request->userName;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $path = $request->file('avatar')->store('/images/avatars', 'public');
            $user->profile_pic = $path;
            $user->save();

            session(['user' => $user]);
            return redirect('/');
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            $message = "<p class='text-danger'>Error creando un nuevo usuario: $errorMessage</p>";

            return view('users.create', compact('message'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $imgPath = Storage::url($user->profile_pic);
        return view('users.submenu.profile', compact('user', 'imgPath'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $imgPath = Storage::url($user->profile_pic);
        return view('users.edit', compact('user', 'imgPath'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->userName;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->surname = $request->surname;

        // Si el input tiene imagen
        if ($request->hasFile('avatar')) {
            // Borrar imagen vieja
            $oldPath = $user->profile_pic;
            Storage::disk('public')->delete($oldPath);

            // Actualizar imagen
            $path = $request->file('avatar')->store('/images/avatars', 'public');
            $user->profile_pic = $path;
        }

        $user->save();

        $imgPath = Storage::url($user->profile_pic);
        return view('users.submenu.profile', compact('user', 'imgPath'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!session('user')->admin) {
            $loginController = new LoginController;
            $loginController->logout();
        }
        // Borrar avatar
        $path = $user->profile_pic;
        Storage::disk('public')->delete($path);
        // Borrar User
        $user->delete();
        return redirect('/');
    }
}
