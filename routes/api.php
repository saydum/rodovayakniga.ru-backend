<?php

use App\Http\Controllers\Api\V1\App\RodController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users/register', [RegisterController::class, 'register'])->name('register');
Route::apiResource('rods', RodController::class);


//Route::middleware('auth:sanctum')
//    ->group(function () {
//        Route::apiResource('rods', RodController::class);
//        Route::apiResource('humans', HumanController::class);
//        Route::apiResource('links', LinkManagerController::class);
//
//        Route::get(
//            '/rodovoe-drevo/{human}/show',
//            [RodovoeDrevoController::class, 'show'])
//            ->name('rodovoe-drevo.show');
//
//        Route::post('/humans/search', [HumanController::class, 'search'])
//            ->name('humans.search');
//});
