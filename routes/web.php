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
Route::get('/pregunta/{id}', 'PreguntaController@show')->name('pregunta.usuario')->middleware('auth');




Route::get('/cerrarSesion', 'UserController@cerrarSesion')->name('cerrarSesion')->middleware('auth');
Route::get('/perfil', 'UserController@show')->name('perfil')->middleware('auth');
Route::get('/usuario/{id}/update', 'UserController@update')->name('perfil.update')->middleware('auth');


Route::get('/favorito', 'FavoritoController@store')->name('favorito')->middleware('auth');


