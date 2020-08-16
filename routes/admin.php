<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function(){

    Route::get('/', function () {
        return "Hi";
    })->name('admin.dashboard');

    Route::get('/login', 'Auth\AdminController@getLogin')->name('admin.login');
    Route::post('/login', 'Auth\AdminController@postLogin')->name('admin.login');

    Route::post('/logout', 'Auth\AdminController@postLogout')->name('admin.logout');

    Route::get('/register', 'Auth\AdminController@getRegister')->name('admin.register');
    Route::post('/register', 'Auth\AdminController@postRegister')->name('admin.register');
});