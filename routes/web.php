<?php

use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\HumanController;
use App\Http\Controllers\App\RodController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'perform'])
    ->name('logout')
    ->middleware('auth');

Route::middleware(['auth'])->group( function () {
    Route::resource('rods', RodController::class);
    Route::resource('humans', HumanController::class);
});
