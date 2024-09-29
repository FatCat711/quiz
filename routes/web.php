<?php

use App\Http\Controllers\AdminPanel;
use App\Http\Controllers\GameAdmin;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games', [GameController::class, 'index'])->name('game.index');

Route::get('/games/{game}', [GameController::class, 'show'])->name('game.show');

Route::get('/games/{game}/admin', [GameAdmin::class, 'show'])->name('game.admin.show');

Route::get('/games/{game}/admin_panel', [AdminPanel::class, 'show'])->name('admin.panel.show');

Route::get('register/{game}', [AuthController::class, 'register'])->name('register');

Route::post('register/{game}', [AuthController::class, 'store']);

Route::get('/games/{game}/results', [ResultController::class, 'show'])->name('result.show');

Route::get('logout', [AuthController::class, 'logout']);
