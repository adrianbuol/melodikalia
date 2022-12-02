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
Route::resource('albums', AlbumController::class);


// Vista Admin (Menu CRUD)
Route::get('/admin', function () {
    return view('/admin/admin');
});


// Crud Albumes
Route::get('/admin/album', [AlbumController::class, 'index']);
Route::get('/albums/user-albums/{user}', [AlbumController::class, 'list']);



// Crud Generos
Route::get('/admin/genre', [GenreController::class, 'index']);


// Crud Canciones
Route::get('/admin/song', [SongController::class, 'index']);
Route::post('/songs/add-to-album', [SongController::class, 'addToAlbum']);


// Usuarios => Sub menu
Route::get('/admin/user', [UserController::class, 'index']);

Route::get('/like', function () {
    return view('/users/submenu/like');
});
Route::get('/following', function () {
    return view('/users/submenu/following');
});
Route::get('/followers', function () {
    return view('/users/submenu/followers');
});
