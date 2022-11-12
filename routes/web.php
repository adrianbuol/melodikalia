<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
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


// Vista Admin (Menu CRUD)
Route::get('/admin', function () {
    return view('/admin/admin');
});


// Crud Albumes
Route::get('/album', function () {
    return view('/admin/album');
});


// Crud Generos
Route::get('/genre', function () {
    return view('/admin/genre');
});
Route::get('/genres/create', [GenreController::class, 'create']);
Route::post('/genres/store', [GenreController::class, 'store']);


// Crud Canciones
Route::get('/song', function () {
    return view('/admin/song');
});
Route::get('/songs/create', [SongController::class, 'create']);
Route::post('/songs/store', [SongController::class, 'store']);


// Usuarios => Sub menu
Route::get('/user', function () {
    return view('/admin/user');
});
Route::get('/profile', function () {
    return view('/users/submenu/profile');
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


// CRUD Usuarios
Route::get('/users', 'UserController@index');
Route::get('/users/create', [UserController::class, 'create']); //Este formato para las vistas
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::get('/users/{user}/update', 'UserController@update');


// GET, POST, PUT, DELETE

// GET /users
// GET /users/create    //Muestra la vista con el formulario de registro
// POST /users          //Publica los cambios
// GET /users/:id
// POST /users
// PUT /users/:id
// DELETE /users/:id
