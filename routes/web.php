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
Route::get('/busqueda', 'ProductoController@search');

Route::get('/producto/{producto}', 'ProductoController@show')->name('producto.show');


Auth::routes();


// Rutas de usuarios
Route::get('/user/{user}', 'UsersController@show');


// Rutas de validación
Route::post('/registro/validar', 'Auth\RegisterController@validacionAjax');
Route::post('/producto/validar', 'ProductoController@validacionAjax');
Route::post('/editar/validar', 'ProfileController@validacionAjax');


Route::group(['middleware' => 'auth'], function () {

    // Rutas de productos
    Route::get('/productos/crear', 'ProductoController@create');
    Route::post('/productos/crear', 'ProductoController@store');

    Route::get('/producto/{producto}/editar', 'ProductoController@edit');

    Route::get('/producto/{producto}/editar/informacion-general', 'ProductoController@edit')->name('producto.info');
    Route::patch('/producto/{producto}/editar/informacion-general', 'ProductoController@update');

    Route::get('/producto/{producto}/editar/foto', 'ProductoController@edit')->name('producto.foto');
    Route::patch('/producto/{producto}/editar/foto', 'ProductoController@update');

    Route::get('/producto/{producto}/editar/otros-datos', 'ProductoController@edit')->name('producto.otros');
    Route::patch('/producto/{producto}/editar/otros-datos', 'ProductoController@update');

    Route::get('/producto/{producto}/editar/borrar-producto', 'ProductoController@edit')->name('producto.borrar');
    Route::delete('/producto/{producto}/editar/borrar-producto', 'ProductoController@destroy');


        // Rutas de contraofertas/ofertas
    Route::post('/producto/{producto}/contraoferta', 'ContraofertaController@store')->name('contraoferta.create');

    Route::get('/ofertas/{nombre_usuario}', 'ContraofertaController@oferta')->name('contraoferta.ofertas');
    Route::get('/ofertas-aceptadas/{nombre_usuario}', 'ContraofertaController@ofertaAceptada')->name('contraoferta.aceptada');
    Route::put('/ofertas/{nombre_usuario}/editado', 'ContraofertaController@update')->name('contraoferta.update');


    // Rutas de usuarios

        // Rutas del perfil
    Route::get('/perfil', 'ProfileController@index');

    Route::get('/perfil/cuenta', 'ProfileController@perfilCuenta');

    Route::get('/perfil/datos-personales', 'ProfileController@perfilDatosPersonales');

    Route::get('/perfil/localizacion', 'ProfileController@perfilLocalizacion');


        // Rutas de editar el perfil
    Route::get('/perfil/editar', 'ProfileController@editProfile');

    Route::get('/perfil/editar/cuenta', 'ProfileController@edit')->name('perfil.cuenta');
    Route::patch('/perfil/editar/cuenta', 'ProfileController@update');

    Route::get('/perfil/editar/password', 'ProfileController@edit')->name('perfil.password');
    Route::patch('/perfil/editar/password', 'ProfileController@update');

    Route::get('/perfil/editar/avatar', 'ProfileController@edit')->name('perfil.avatar');
    Route::patch('/perfil/editar/avatar', 'ProfileController@update');

    Route::get('/perfil/editar/datos-personales', 'ProfileController@edit')->name('perfil.personal');
    Route::patch('/perfil/editar/datos-personales', 'ProfileController@update');

    Route::get('/perfil/editar/borrar-usuario', 'ProfileController@edit')->name('usuario.borrar');
    Route::delete('/perfil/editar/borrar-usuario', 'UsersController@destroy');


        // Rutas conversaciones
    Route::get('/user/conversations/{conversation}', 'UsersController@showConversation')->name('conversation.show');

    Route::post('/user/{user}/dms', 'UsersController@createPrivateMessage');
    Route::get('/user/{user}/conversation', 'UsersController@showUserConversation');

    Route::get('/user/{user}/conversations', 'UsersController@showAllUserConversation')->name('conversation.all');


    // Rutas de reviews
    Route::post('/user/{user}/review', 'ReviewController@store')->name('review.create');

    // Rutas de valoraciones
    Route::post('/user/{user}/valorar', 'ValoracionController@createOrEdit')->name('valoracion.create');

    // Rutas asíncronas
    Route::post('/valorar', 'ValoracionController@valorar');
    Route::post('/comentar', 'ReviewControllerController@comentar');
    Route::delete('/borrar-producto/{producto}', 'ProductoController@borrar')->name('borrar.async');


});

    // Ruta home del proyecto
//Route::get('/home', 'HomeController@index')->name('home');


    // Ruta paginación asíncrona
Route::get('/dameProductos/', 'PagesController@damePaginaProductos');


    // Ruta para el autocompletado
Route::get('/autocomplete', array('as' => 'autocomplete', 'uses'=>'CiudadesController@autocomplete'));


    // Ruta para la tabla de búsqueda
Route::get('/tabla-busqueda', 'ProductoController@tabla');

