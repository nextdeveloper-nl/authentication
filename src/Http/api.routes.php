<?php

Route::prefix('authentication')->group(function() {
    Route::prefix('logs')->group(function () {
        Route::get('/', 'AuthenticationLoginLog\AuthenticationLoginLogController@index');
        Route::get('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@show');
        Route::post('/', 'AuthenticationLoginLog\AuthenticationLoginLogController@store');
        Route::put('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@update');
        Route::delete('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@destroy');
    });

    Route::prefix('loginmechanism')->group(function () {
        Route::get('/', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@index');
        Route::get('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@show');
        Route::post('/', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@store');
        Route::put('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@update');
        Route::delete('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@destroy');
    });

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
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

    Route::prefix('logs')->group(function () {
        Route::get('/', 'AuthenticationLoginLog\AuthenticationLoginLogController@index');
        Route::get('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@show');
        Route::post('/', 'AuthenticationLoginLog\AuthenticationLoginLogController@store');
        Route::put('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@update');
        Route::delete('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@destroy');
    });

    Route::prefix('loginmechanism')->group(function () {
        Route::get('/', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@index');
        Route::get('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@show');
        Route::post('/', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@store');
        Route::put('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@update');
        Route::delete('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@destroy');
    });
});