<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function(){

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/login', 'Auth\AdminLoginController@getLogin')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@postLogin')->name('admin.login');

    Route::post('/logout', 'Auth\AdminLoginController@postLogout')->name('admin.logout');

    Route::get('/register', 'Auth\AdminLoginController@getRegister')->name('admin.register');
    Route::post('/register', 'Auth\AdminLoginController@postRegister')->name('admin.register');
});