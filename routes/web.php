<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Middleware\CheckTreeAccess;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\TreeUiController;
use App\Http\Controllers\WebController;


Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/tree/{human}/{link}', [TreeUiController::class, 'index'])
    ->name('share-tree-link')
    ->middleware(CheckTreeAccess::class);

Route::middleware(['auth'])->group( function () {
    Route::resource('humans', HumanController::class);

    Route::get('/humans', [HumanController::class, 'index'])->name('humans.index');

    Route::get('/trees', [TreeController::class, 'index'])->name('trees.index');
    Route::get('/trees/create', [TreeController::class, 'create'])->name('trees.create');
    Route::get('/trees/{tree}/show', [TreeController::class, 'show'])->name('trees.show');
    Route::get('/trees/{tree}/edit', [TreeController::class, 'edit'])->name('trees.edit');

    Route::get('/trees/{tree}/humans', [TreeController::class, 'show'])->name('tree-humans.show');
    Route::get('/trees/{tree}/humans/create', [TreeController::class, 'show'])->name('tree-humans.show');

//    Route::resource('trees', TreeController::class);

    Route::get('/tree/{human}', [TreeUiController::class, 'index'])->name('humans.tree');
});

Auth::routes();
Route::get('/app', [HumanController::class, 'index'])->name('app');
