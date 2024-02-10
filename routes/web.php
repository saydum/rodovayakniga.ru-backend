<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RodController;
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

    Route::get('/rod', [RodController::class, 'index'])->name('rod.index');
    Route::get('/rod/create', [RodController::class, 'create'])->name('rod.create');
    Route::get('/rod/{rod}/show', [RodController::class, 'show'])->name('rod.show');
    Route::get('/rod/{rod}/edit', [RodController::class, 'edit'])->name('rod.edit');

    Route::get('/rod/{rod}/humans', [RodController::class, 'show'])->name('rod-humans.show');
    Route::get('/rod/{rod}/humans/create', [RodController::class, 'show'])->name('rod-humans.show');

    Route::resource('trees', RodController::class);

    Route::get('/rod/tree/{human}', [TreeUiController::class, 'index'])->name('rod-humans.tree');
});

Auth::routes();
Route::get('/app', [HumanController::class, 'index'])->name('app');
