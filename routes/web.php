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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/index', 'PreguntaController@index')->name('index')->middleware('auth');

Route::get('/create/pregunta', 'PreguntaController@create')->name('pregunta.create')->middleware('auth');

Route::post('/pregunta/store','PreguntaController@store')->name('pregunta.store')->middleware('auth');
Route::get('/pregunta/update', 'PreguntaController@update')->name('pregunta.update')->middleware('auth');
Route::get('/respuesta/update', 'RespuestaController@update')->name('respuesta.update')->middleware('auth');

Route::get('/pregunta/misPreguntas/{id}', 'PreguntaController@misPreguntas')->name('pregunta.mispreguntas')->middleware('auth');
Route::get('/pregunta/puntos', 'PreguntaController@orderByPuntos')->name('pregunta.puntos')->middleware('auth');
Route::get('/pregunta/favoritos/{id}', 'PreguntaController@favoritos')->name('pregunta.favoritos')->middleware('auth');



Route::get('/cerrarSesion', 'UserController@cerrarSesion')->name('cerrarSesion')->middleware('auth');
Route::get('/perfil', 'UserController@show')->name('perfil')->middleware('auth');
Route::post('/usuario/update/{id}', 'UserController@update')->name('perfil.update')->middleware('auth');


Route::get('/favorito', 'FavoritoController@store')->name('favorito')->middleware('auth');

Route::get('/contactarAnunciante', 'UserController@contactar')->name('contactar.anunciante')->middleware('auth');

Route::get('/anuncio/detalle/{id}', 'PreguntaController@show')->name('anuncio.detalle')->middleware('auth');

Route::post('/respuesta/añadir/{id}', 'RespuestaController@store')->name('respuesta.añadir')->middleware('auth');

Route::get('/archivo/descargar/{id}', 'RespuestaController@show')->name('archivo.descargar')->middleware('auth');