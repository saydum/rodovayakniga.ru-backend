<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Middleware\CheckTreeAccess;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\WebController;


Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/app/{human}/{link}', [TreeController::class, 'index'])
    ->name('share-tree-link')
    ->middleware(CheckTreeAccess::class);

Route::middleware(['auth'])->group( function () {
    Route::resource('humans', HumanController::class);
    Route::get('/app/{human}', [TreeController::class, 'index'])->name('humans.tree');
});

Auth::routes();
Route::get('/app', [HumanController::class, 'index'])->name('app');
