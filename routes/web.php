<?php

use App\Http\Controllers\HumanController;
use App\Http\Controllers\RodController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::resource('rod', RodController::class);
Route::resource('humans', HumanController::class);

Route::get('/tree/{human}', [TreeController::class, 'index'])->name('tree.index');
