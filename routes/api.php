<?php

use App\Http\Controllers\HakatonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
 * @see UserController
 */

Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/hackathons', [HakatonController::class, 'allevents']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'getUser']);
    Route::post('/user/logout',[UserController::class, 'logout']);
    Route::post('/hackathons/create', [HakatonController::class, 'create']);
    Route::put('/hackathons/edit/{id}', [HakatonController::class, 'update']);
    Route::delete('/hackathons/delete/{id}', [HakatonController::class, 'delete']);
});


