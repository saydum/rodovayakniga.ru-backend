<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\RodController;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\HumanController;

Route::get('/', function () {
    return view('web.index');
});

Route::get('/app', [HomeController::class, 'index'])->name('app');
Route::get('/blog')->name('posts.index');

Route::prefix('app')->group( function () {
    Route::resource('rods', RodController::class);
    Route::resource('humans', HumanController::class);
})->middleware('auth');

Auth::routes();

Route::get('/app', [HomeController::class, 'index'])->name('app');
