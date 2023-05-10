<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hexiros\PersonTrait\Http\Controllers\PersonController;

Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        // Route::resource('/user/{user}/person', PersonController::class);
        Route::get('user/{user}/person', [PersonController::class, 'index']);
        Route::post('user/{user}/person', [PersonController::class, 'store']);
        Route::put('user/{user}/person', [PersonController::class, 'store']);
        Route::delete('user/{user}/person', [PersonController::class, 'destroy']);
    });
