<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesControler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return "Bienvenidos al curso de Laravel 9 en El rincon de Isma";
});

Route::get('/games', [GamesControler::class, 'index'])->name('games');
Route::get('/games/create', [GamesControler::class, 'create'])->name('gamesCreate');
Route::get('/games/{name_game}/{categoria?}', [GamesControler::class, 'help']);
Route::post('/games/storeVideogame', [GamesControler::class, 'storeVideogame'])->name('createVideogame');
Route::get('/view/{game_id}', [GamesControler::class, 'view'])->name('viewGame');
Route::post('/games/updateVideogame', [GamesControler::class, 'updateVideogame'])->name('updateVideogame');
Route::get('/delete/{game_id}', [GamesControler::class, 'delete'])->name('deleteGame');


//Route::resource('categories', CategoryController::class);