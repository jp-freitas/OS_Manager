<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/OS'], function() {
    Route::get('/create', 'HomeController@create')->name('create');
    Route::post('/store', 'HomeController@store')->name('store');
    Route::get('/regist', 'HomeController@regist')->name('regist');
    Route::post('/registering', 'HomeController@registering')->name('registering');
    Route::get('/{id}/form', 'HomeController@form')->name('form');
    Route::post('/{id}/edit', 'HomeController@edit')->name('edit');
    Route::get('/{id}/view', 'HomeController@view')->name('view');
    Route::get('/{id}/destroy', 'HomeController@destroy')->name('destroy');
});