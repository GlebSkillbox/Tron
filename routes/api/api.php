<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Favorite\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::apiResource('pages', 'App\Http\Controllers\Api\Pages\PageController');
Route::apiResource('feedback', 'App\Http\Controllers\Api\FeedbackController')->only('create', 'store');

Route::post('/users/{user}/favorite', [FavoriteController::class, 'addFavoriteUser'])->name('user.addFavorite');
Route::delete('/users/{user}/favorite', [FavoriteController::class, 'removeFavoriteUser'])->name('user.removeFavorite');

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
});
