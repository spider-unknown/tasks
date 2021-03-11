<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth', 'verify' => true], function () {

    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    });
});
