<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function(){

    Route::get('/', 'Admin\DashboardController@getDashboard')->name('admin.dashboard');
    Route::get('/users', 'Admin\UserController@getUsers')->name('admin.users');
    Route::get('/products', 'Admin\ProductController@getProducts')->name('admin.products');
    Route::get('/product/add', 'Admin\ProductController@getProductAdd')->name('admin.users');



    Route::get('/login', 'Auth\AdminLoginController@getLogin')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@postLogin')->name('admin.login');

    Route::get('/logout', 'Auth\AdminLoginController@getLogout')->name('admin.logout');

    Route::get('/register', 'Auth\AdminLoginController@getRegister')->name('admin.register');
    Route::post('/register', 'Auth\AdminLoginController@postRegister')->name('admin.register');
});