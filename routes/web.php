<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Middleware\CheckTreeAccess;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\WelcomeController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/app/{human}/{link}', [TreeController::class, 'shareLink'])
    ->name('share-tree-link')
    ->middleware(CheckTreeAccess::class);

Route::middleware(['auth'])->group( function () {
    Route::resource('humans', HumanController::class);
    Route::get('/app/{human}', [TreeController::class, 'index'])->name('humans.tree');
});

Auth::routes();
Route::get('/app', [HumanController::class, 'index'])->name('app');
