<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::apiResource('pages', 'App\Http\Controllers\Api\Pages\PageController');
Route::apiResource('feedback', 'App\Http\Controllers\Api\FeedbackController')->only('create', 'store');

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('login', [AuthController::class, 'token'])->name('auth.login');
});
