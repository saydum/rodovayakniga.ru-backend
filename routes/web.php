<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\RodController;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\HumanController;
use App\Http\Controllers\App\LinkManagerController;
use App\Http\Controllers\App\RodovoeDrevoController;
use App\Http\Controllers\App\SearchHumansController;

Route::get('/', function () {
    return view('web.index');
});

Route::get('/app', [HomeController::class, 'index'])->name('app');
Route::get('/blog')->name('posts.index');

Route::get('/rodovoe-drevo/{human}/{link}', [RodovoeDrevoController::class, 'show'])
    ->name('rodovoe-drevo.link')
    ->middleware('access.rodovoedrevo');

Route::middleware(['auth'])->prefix('app')->group( function () {
    Route::resource('rods', RodController::class);
    Route::resource('humans', HumanController::class);
    Route::resource('links', LinkManagerController::class);

    Route::get('/rodovoe-drevo/{human}/show', [RodovoeDrevoController::class, 'show'])
        ->name('rodovoe-drevo.show');

    Route::post('/humans/search', [SearchHumansController::class, 'index'])
        ->name('humans.search');
});

Auth::routes();

Route::get('/app', [HomeController::class, 'index'])->name('app');
