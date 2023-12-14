<?php

use App\Http\Controllers\HumanController;
use App\Http\Controllers\RodController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::middleware(['auth'])->group( function () {

    // ROD
    Route::resource('rod', RodController::class);

    Route::get('/rod/{rod}/humans', [RodController::class, 'getHumansByRodId'])->name('rod.humans.index');
    Route::get('/rod/{rod}/humans/add', [HumanController::class, 'createByRodId'])->name('rod.humans.add');
    Route::post('/rod/{rod}/humans/store', [HumanController::class, 'store'])->name('rod.humans.store');
    Route::get('/rod/{rod}/humans/{human}/edit', [HumanController::class, 'edit'])->name('rod.humans.edit');
    Route::put('/rod/{rod}/humans/{human}/update', [HumanController::class, 'update'])->name('rod.humans.update');

    Route::get('/rod/{rod}/humans/tree', [TreeController::class, 'index'])->name('rod.humans.tree');

    Route::resource('humans', HumanController::class);
});

Auth::routes();
Route::get('/home', [RodController  ::class, 'index'])->name('home');
