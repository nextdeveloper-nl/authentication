<?php

Route::prefix('authentication')->group(function() {
Route::prefix('authenticationuserlogin')->group(function () {
        Route::get('/', 'AuthenticationUserLogin\AuthenticationUserLoginController@index');
        Route::get('/{authenticationuserlogin}', 'AuthenticationUserLogin\AuthenticationUserLoginController@show');
        Route::post('/', 'AuthenticationUserLogin\AuthenticationUserLoginController@store');
        Route::put('/{authenticationuserlogin}', 'AuthenticationUserLogin\AuthenticationUserLoginController@update');
        Route::delete('/{authenticationuserlogin}', 'AuthenticationUserLogin\AuthenticationUserLoginController@destroy');
    });

Route::prefix('authenticationtwofa')->group(function () {
        Route::get('/', 'AuthenticationTwoFa\AuthenticationTwoFaController@index');
        Route::get('/{authenticationtwofa}', 'AuthenticationTwoFa\AuthenticationTwoFaController@show');
        Route::post('/', 'AuthenticationTwoFa\AuthenticationTwoFaController@store');
        Route::put('/{authenticationtwofa}', 'AuthenticationTwoFa\AuthenticationTwoFaController@update');
        Route::delete('/{authenticationtwofa}', 'AuthenticationTwoFa\AuthenticationTwoFaController@destroy');
    });

Route::prefix('authenticationloginlog')->group(function () {
        Route::get('/', 'AuthenticationLoginLog\AuthenticationLoginLogController@index');
        Route::get('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@show');
        Route::post('/', 'AuthenticationLoginLog\AuthenticationLoginLogController@store');
        Route::put('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@update');
        Route::delete('/{authenticationloginlog}', 'AuthenticationLoginLog\AuthenticationLoginLogController@destroy');
    });

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
});