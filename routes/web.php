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

// Rutas de productos
Route::get('/productos/create', 'ProductoController@create')->middleware('auth');
Route::get('/productos/show/{producto}', 'ProductoController@show');
Route::post('/productos/create', 'ProductoController@store')->middleware('auth');

Auth::routes();

// Rutas de usuarios
Route::get('/user/{user}', 'UsersController@index');
Route::get('/profile/', 'ProfileController@index')->middleware('auth');

// Rutas de contraofertas/ofertas
Route::post('/productos/contraoferta/', 'ContraofertaController@store')->name('contraoferta.create')->middleware('auth');
Route::get('/ofertas/{nombre_usuario}', 'ContraofertaController@oferta')->middleware('auth');

// Rutas de valoraciones
Route::post('valoraciones/valorar', 'ValoracionController@store')->name('valoracion.create')->middleware('auth');
Route::get('valoraciones/{nombre_usuario}', 'ValoracionController@valoracion');

// Rutas de reviews
Route::post('reviews/review', 'ReviewController@store')->name('review.create')->middleware('auth');

// Rutas de validación
Route::post('/registro/validar', 'Auth\RegisterController@validacionAjax');
Route::post('/producto/validar', 'ProductoController@validacionAjax');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dameProductos/', 'PagesController@damePaginaProductos');
