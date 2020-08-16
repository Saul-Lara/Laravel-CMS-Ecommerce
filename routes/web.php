<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', 'Auth\UserLoginController@getLogin')->name('login');
Route::post('/login', 'Auth\UserLoginController@postLogin')->name('login');

Route::get('/logout', 'Auth\UserLoginController@getLogout')->name('logout');

Route::get('/register', 'Auth\UserLoginController@getRegister')->name('register');
Route::post('/register', 'Auth\UserLoginController@postRegister')->name('register');