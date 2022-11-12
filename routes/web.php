<?php

use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('child');
});

Route::get('/admin', function () {
    return view('/admin/admin');
});

Route::get('/album', function () {
    return view('/admin/album');
});

Route::get('/genre', function () {
    return view('/admin/genre');
});

Route::get('/song', function () {
    return view('/admin/song');
});

Route::get('/user', function () {
    return view('/admin/user');
});

Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs/store', [SongController::class, 'store']);

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
