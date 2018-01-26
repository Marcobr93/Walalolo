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

Route::get('/', 'PagesController@home');
Route::get('/saludo', 'PagesController@saludo');

Route::get('/productos/create', 'ProductoController@create')->middleware('auth');
Route::get('/productos/{producto}', 'ProductoController@show');
Route::post('/productos/create', 'ProductoController@store')->middleware('auth');
Route::post('/auth/register', 'RegisterController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
