<?php

Route::prefix('authentication')->group(function() {
    Route::prefix('user')->group(function () {
        Route::get('/', 'User\UserController@index');
        Route::get('/{user}', 'User\UserController@show');
        Route::post('/', 'User\UserController@store');
        Route::put('/{user}', 'User\UserController@update');
        Route::delete('/{user}', 'User\UserController@destroy');
        Route::post('/oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::post('/login', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::post('/logout', '\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy');
    });

//!APPENDHERE
  
    Route::prefix('social-login')->middleware('web')->group(function() {
        Route::get('/{provider}','SocialLoginController@socialLogin');
        Route::get('/{provider}/redirect','SocialLoginController@socialLoginRedirect');
    });

});