<?php

use NextDeveloper\Account\Http\Controllers\User\UserController;

Route::prefix('authentication')->group(function() {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::post('/', [UserController::class, 'store']);
        Route::put('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'destroy']);
        Route::post('/oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::post('/login', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::post('/logout', '\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy');
    });

//!APPENDHERE
});