<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\WelcomeController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::middleware(['auth'])->group( function () {
    Route::resource('humans', HumanController::class);
    Route::get('/humans/{id}tree', [TreeController::class, 'index'])->name('rod.humans.tree');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
