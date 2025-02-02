<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);

Route::post('auth/login', [UserController::class, 'login']);
// Route::post('auth/logout', [UserController::class, 'logout']);
// Route::post('auth/refresh', [UserController::class, 'refresh']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
});
