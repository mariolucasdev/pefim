<?php

use App\Http\Controllers\{BankAccountController, CategoryController, CreditCardController, UserController};
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);

Route::post('auth/login', [UserController::class, 'login']);
// Route::post('auth/logout', [UserController::class, 'logout']);
// Route::post('auth/refresh', [UserController::class, 'refresh']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('cards', CreditCardController::class);
    Route::apiResource('bank-accounts', BankAccountController::class);

    Route::get('bank-logos', function () {
        return request()
            ->user()
            ->bankLogos();
    });
});
