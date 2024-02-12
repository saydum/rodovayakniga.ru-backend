<?php

use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\HumanController;
use App\Http\Controllers\App\RodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web.index');
});

Route::get('/app', [HomeController::class, 'index'])->name('app');
Route::get('/blog')->name('posts.index');

Route::middleware(['auth'])->group( function () {
    Route::resource('rods', RodController::class);
    Route::resource('humans', HumanController::class);
});

Auth::routes();

Route::get('/app', [App\Http\Controllers\HomeController::class, 'index'])->name('app');
