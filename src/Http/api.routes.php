<?php

Route::prefix('authentication')->group(function() {
Route::prefix('authenticationloginlog')->group(function () {
        Route::get('/', 'AuthenticationLoginLog\AuthenticationLoginLogController@index');
        Route::get('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@show');
        Route::post('/', 'AuthenticationLoginLog\AuthenticationLoginLogController@store');
        Route::put('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@update');
        Route::delete('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@destroy');
    });

Route::prefix('authenticationloginmechanism')->group(function () {
        Route::get('/', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@index');
        Route::get('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@show');
        Route::post('/', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@store');
        Route::put('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@update');
        Route::delete('/{authenticationloginmechanism}', 'AuthenticationLoginMechanism\AuthenticationLoginMechanismController@destroy');
    });

Route::prefix('authenticationtwofa')->group(function () {
        Route::get('/', 'AuthenticationTwoFa\AuthenticationTwoFaController@index');
        Route::get('/{authenticationtwofa}', 'AuthenticationTwoFa\AuthenticationTwoFaController@show');
        Route::post('/', 'AuthenticationTwoFa\AuthenticationTwoFaController@store');
        Route::put('/{authenticationtwofa}', 'AuthenticationTwoFa\AuthenticationTwoFaController@update');
        Route::delete('/{authenticationtwofa}', 'AuthenticationTwoFa\AuthenticationTwoFaController@destroy');
    });

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
});