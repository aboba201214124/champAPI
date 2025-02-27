<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\HakatonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
 * @see UserController
 */

Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/hackathons', [HakatonController::class, 'index']);
Route::get('/hackathons/{id}', [HakatonController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'getUser']);
    Route::post('/user/logout',[UserController::class, 'logout']);

    Route::get('/user/hackathons/{userid}', [HakatonController::class, 'user']);
    Route::post('/hackathons/create', [HakatonController::class, 'create']);
    Route::put('/hackathons/edit/{Hakaton:id}', [HakatonController::class, 'update']);
    Route::delete('/hackathons/delete/{Hakaton:id}', [HakatonController::class, 'delete']);

    Route::post('/command/create', [CommandController::class, 'create']);
});


