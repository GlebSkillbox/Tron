<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('login', [AuthController::class, 'token'])->name('auth.login');
});


Route::prefix('admin')->name('admin.')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('news', 'App\Http\Controllers\Api\Admin\NewsController');
});
