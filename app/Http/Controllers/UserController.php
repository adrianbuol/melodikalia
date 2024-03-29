<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use App\Models\Song;
use App\Models\Genre;
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
        if (session('user')->admin) {
            $allUsers = User::all();
            return view('admin.user', compact('allUsers'));
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
        if (session('user')) {
            if (session('user')->admin) {
                return view('users.create');
            } else {
                return redirect('/');
            }
        } else {
            return view('users.create');
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
            $user = new User;
            $user->username = $request->userName;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->surname = $request->surname;
            if (!$request->hasFile('avatar')) {
                $path = "icons/generic_avatar.png";
                // $path = $request->file('icons/generic_avatar.png')->store('/images/avatars', 'public');
            } else {
                $path = $request->file('avatar')->store('/images/avatars', 'public');
            }
            if ($request->name == null || $request->name == "") {
                $user->name = " ";
            }
            if ($request->surname == null || $request->surname == "") {
                $user->surname = " ";
            }
            $user->profile_pic = $path;
            $user->save();

            session(['user' => $user]);

            return redirect('/');
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            // $message = "<p class='text-danger'>Error creando un nuevo usuario: $errorMessage</p>";
            $message = "<div id='msg-error' class='msg alert alert-danger w-50 mt-4'>
            <p>Error creando un nuevo usuario.</p></div>";

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
        // $imgPath = Storage::url($user->profile_pic);
        $imgPath = "/uploads/$user->profile_pic";

        $sessionUser = session('user');
        $userSongs = Song::get()->where('user_id', $user->id);
        $userAlbums = Album::get()->where('user_id', $user->id);
        $genres = Genre::all();

        $numFollowers = $user->followers->count();
        $numFollows = $user->following->count();
        if (session('user') == null) {
            return view('users.submenu.profile', compact('user', 'imgPath', 'userSongs', 'userAlbums', 'genres', 'numFollows', 'numFollowers'));
        } else {
            $follows = $user->followers->find($sessionUser->id) ? true : false;

            return view('users.submenu.profile', compact('user', 'imgPath', 'userSongs', 'userAlbums', 'genres', 'follows', 'numFollows', 'numFollowers'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (session('user')->id == $user->id || session('user')->admin) {
            $imgPath = "/uploads/$user->profile_pic";
            return view('users.edit', compact('user', 'imgPath'));
        } else {
            return redirect('/');
        }
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

        try {
            $user = User::find($id);
            $user->username = $request->userName;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->surname = $request->surname;

            // Si el input tiene imagen
            if ($request->hasFile('avatar')) {

                if ($user->profile_pic == "icons/generic_avatar.png") {
                    // Actualizar imagen
                    $path = $request->file('avatar')->store('/images/avatars', 'public');
                    $user->profile_pic = $path;
                } else {
                    // Borrar imagen vieja
                    $oldPath = $user->profile_pic;
                    Storage::disk('public')->delete($oldPath);

                    // Actualizar imagen
                    $path = $request->file('avatar')->store('/images/avatars', 'public');
                    $user->profile_pic = $path;
                }
            }
            if ($request->name == null || $request->name == "") {
                $user->name = " ";
            }
            if ($request->surname == null || $request->surname == "") {
                $user->surname = " ";
            }

            $user->save();
            $message = "<div id='msg-ok' class='msg alert alert-success w-50 mt-4'>
                <p>Usuario actualizado correctamente.</p></div>";
        } catch (\Throwable $th) {
            $message = "<div id='msg-error' class='msg alert alert-danger w-50 mt-4'>
            <p>Error editando el usuario.</p></div>";
        }

        return back()->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function destroy(User $user)
    // {
    //     if (!session('user')->admin) {
    //         $loginController = new LoginController;
    //         $loginController->logout();
    //     } else if (session('user')->id != $user->id && !session('user')->admin) {
    //         return redirect('/');
    //     }
    //     // Borrar avatar
    //     $path = $user->profile_pic;
    //     Storage::disk('public')->delete($path);
    //     // Borrar User
    //     $user->delete();
    //     return redirect('/');
    // }
    public function destroy(User $user)
    {
        if (!session('user')->admin) {
            $loginController = new LoginController;
            $loginController->logout();
        } else if (session('user')->id != $user->id && !session('user')->admin) {
            return redirect('/');
        }

        if ($user->profile_pic == "icons/generic_avatar.png") {
            $user->delete();
        } else {
            // Borrar avatar
            $path = $user->profile_pic;
            Storage::disk('public')->delete($path);
            // Borrar User
            $user->delete();
        }

        return redirect('/');
    }


    public function like(User $user)
    {
        $like = $user->likes;

        $allGenres = Genre::all();
        $allUsers = User::all();

        return view('/users/submenu/like', compact('like', 'allGenres', 'allUsers'));
    }

    public function follow(User $user)
    {
        $sessionUser = session('user');
        $user->followers()->attach($sessionUser->id);
        return redirect("users/$user->id");
    }
    public function unfollow(User $user)
    {
        $sessionUser = session('user');
        $user->followers()->detach($sessionUser->id);
        return redirect("users/$user->id");
    }
    public function following(User $user)
    {
        $following = $user->following;
        return view('/users/submenu/following', compact('following', 'user'));
    }

    public function followers(User $user)
    {
        $follower = $user->followers;
        return view('/users/submenu/followers', compact('follower', 'user'));
    }
}
