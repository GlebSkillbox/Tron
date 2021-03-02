<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('news', 'App\Http\Controllers\Api\Admin\NewsController');
