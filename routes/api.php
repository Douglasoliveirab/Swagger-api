<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, "index"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/newUser', [UserController::class, 'store']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
