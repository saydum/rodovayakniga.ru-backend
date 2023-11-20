<?php

use App\Http\Controllers\HumanController;
use App\Http\Controllers\RodController;
use App\Http\Controllers\TreeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Route::resource('rod', RodController::class);
//Route::resource('humans', HumanController::class);
//
//Route::get('/tree/{human}', [TreeController::class, 'index'])->name('tree.index');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
