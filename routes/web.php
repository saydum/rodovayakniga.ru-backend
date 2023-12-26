<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\WelcomeController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::middleware(['auth'])->group( function () {
    Route::resource('humans', HumanController::class);
    Route::get('/app/{human}', [TreeController::class, 'index'])->name('humans.tree');
});

Auth::routes();
Route::get('/app', [HumanController::class, 'index'])->name('app');
