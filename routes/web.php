<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/users', 'UsersController@index');
Route::get('/users/create', [UsersController::class, 'create'])->name('user.create'); //Este formato para las vistas
Route::get('/users/{user}', 'UsersController@show');
Route::get('/users/{user}/edit', 'UsersController@edit');
Route::get('/users/{user}/update', 'UsersController@update');


// GET, POST, PUT, DELETE

// GET /users
// GET /users/create    //Muestra la vista con el formulario de registro
// POST /users          //Publica los cambios
// GET /users/:id
// POST /users
// PUT /users/:id
// DELETE /users/:id
