<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('news', 'App\Http\Controllers\Api\Admin\NewsController');

Route::prefix('users')->name('users.')->group(function () {
    Route::apiResource('feedback', 'App\Http\Controllers\Api\Admin\UserFeedbackController');
});
