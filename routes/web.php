<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController; // 追記

use  App\Http\Controllers\GamesController; //追記
use  App\Http\Controllers\NotesController; //追記

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

Route::get('/', [GamesController::class, 'index']);

Route::get('/dashboard', [GamesController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);
    Route::resource('games', GamesController::class, ['only' => ['store', 'destroy']]);
    Route::resource('notes', NotesController::class, ['only' => ['store', 'destroy']]);
});

// ゲームの詳細ページを表示するルート
Route::get('/games/{game}', [NotesController::class, 'show'])->name('games.show');

require __DIR__.'/auth.php';
