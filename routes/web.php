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

// Rutas de productos

Route::get('/productos/show/{producto}', 'ProductoController@show');


Auth::routes();

// Rutas de usuarios
Route::get('/user/{user}', 'UsersController@index');


// Rutas de validación
Route::post('/registro/validar', 'Auth\RegisterController@validacionAjax');
Route::post('/producto/validar', 'ProductoController@validacionAjax');
Route::post('/editar/validar', 'ProfileController@validacionAjax');

Route::group(['middleware' => 'auth'], function () {
    // Rutas de productos
    Route::get('/productos/create', 'ProductoController@create');
    Route::post('/productos/create', 'ProductoController@store');
    Route::get('/producto/{producto}/editar', 'ProductoController@edit')->name('producto.edit');
    Route::put('/producto/{producto}/editado', 'ProductoController@update')->name('producto.update');

    // Rutas de usuarios
    Route::get('/perfil/{user}', 'ProfileController@index');
    Route::get('/perfil/{user}/editar', 'ProfileController@edit')->name('user.edit');
    Route::put('/perfil/{user}/editado', 'ProfileController@update')->name('user.update');
    Route::get('/user/conversations/{conversation}', 'UsersController@showConversation');
    Route::post('/user/{user}/dms', 'UsersController@sendPrivateMessage');
    Route::get('/user/{user}/conversation', 'UsersController@showUserConversation');


    // Rutas de contraofertas/ofertas
    Route::post('/productos/contraoferta/', 'ContraofertaController@store')->name('contraoferta.create');
    Route::get('/ofertas/{nombre_usuario}', 'ContraofertaController@oferta');
    Route::get('/ofertas-aceptadas/{nombre_usuario}', 'ContraofertaController@ofertaAceptada')->name('contraoferta.aceptada');
    Route::put('/ofertas/{nombre_usuario}/editado', 'ContraofertaController@update')->name('contraoferta.update');

    // Rutas de valoraciones
    Route::post('valoracion/valorar', 'ValoracionController@store')->name('valoracion.create');

    // Rutas de reviews
    Route::post('reviews/review', 'ReviewController@store')->name('review.create');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dameProductos/', 'PagesController@damePaginaProductos');

Route::get('/autocomplete', array('as' => 'autocomplete', 'uses'=>'CiudadesController@autocomplete'));

Route::get('/prueba', 'ProfileController@prueba');
