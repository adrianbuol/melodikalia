<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Landing
Route::get('/', function () {
    return view('child');
});

//Login - Logout
Route::get('/login/view', function () {
    return view('/login');
});
Route::get('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// Crud
Route::resource('users', UserController::class);
Route::resource('songs', SongController::class);
Route::resource('genres', GenreController::class);


// Vista Admin (Menu CRUD)
Route::get('/admin', function () {
    return view('/admin/admin');
});


// Crud Albumes
Route::get('/admin/album', function () {
    return view('/admin/album');
});


// Crud Generos
Route::get('/admin/genre', function () {
    return view('/admin/genre');
});


// Crud Canciones
Route::get('/admin/song', function () {
    return view('/admin/song');
});


// Usuarios => Sub menu
Route::get('/admin/user', function () {
    return view('/admin/user');
});
Route::get('/like', function () {
    return view('/users/submenu/like');
});
Route::get('/following', function () {
    return view('/users/submenu/following');
});
Route::get('/followers', function () {
    return view('/users/submenu/followers');
});


// GET, POST, PUT, DELETE

// GET /users
// GET /users/create    //Muestra la vista con el formulario de registro
// POST /users          //Publica los cambios
// GET /users/:id
// POST /users
// PUT /users/:id
// DELETE /users/:id
