<?php

use App\Http\Controllers\RodController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::resource('rod', RodController::class);
