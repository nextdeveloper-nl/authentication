<?php


Route::prefix('authentication')->group(function() {
    Route::prefix('oauth')->group(function() {
        Route::post('/token', 'AccessTokenController@issueToken');

        Route::middleware('api')
            ->get('/personal-access-tokens', 'PersonalAccessTokenController@forUser');
    });

    Route::prefix('user')->group(function () {
        Route::post('/oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::post('/login', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::post('/logout', '\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy');
    });

//!APPENDHERE
});