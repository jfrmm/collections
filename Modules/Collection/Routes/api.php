<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('api')
    ->group(function () {
        Route::apiResource('collections', 'CollectionController');
    });

Route::middleware('api')
    ->group(function () {
        Route::apiResource('collectibles', 'CollectibleController')->except('index');
    });
