<?php

use App\Http\Controllers\AdminController;
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
Route::get('/', [AdminController::class, 'landing']);

//Login/Logout
Route::get('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// Admin - Menu CRUD
Route::get('/admin', [AdminController::class, 'admin']);

// Crud
Route::resource('users', UserController::class);
Route::resource('songs', SongController::class);
Route::resource('genres', GenreController::class);
Route::resource('albums', AlbumController::class);

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
Route::get('/like', [UserController::class, 'like']);

// Usuarios -> Follows
Route::get('/following', [UserController::class, 'following']);
Route::get('/followers', [UserController::class, 'followers']);
