<?php

use App\Http\Controllers\GameAdmin;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games', [GameController::class, 'index'])->name('game.index');

Route::get('/games/{game}', [GameController::class, 'show'])->name('game.show');

Route::get('/games/{game}/admin', [GameAdmin::class, 'show'])->name('game.admin.show');
