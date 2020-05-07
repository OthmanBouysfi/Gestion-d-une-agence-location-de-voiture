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

Route::get('/','CarController@index');

Route::resource('/cars','CarController');
Route::get('/login','UsersController@login')->name('users.login');
Route::post('/auth','UsersController@auth')->name('users.auth');
Route::post('/logout','UsersController@logout')->name('users.logout');
Route::post('/registre','UsersController@registre')->name('users.registre');
Route::get('/registre','UsersController@create')->name('users.registre');
Route::resource('/commands','CommandController');
Route::get('/commands/{id}/create','CommandController@create')->name('command.create');
Route::get('/user/{id}/profile','UsersController@show')->name('users.profile');
Route::post('/cars','CarController@index')->name('cars.index');
