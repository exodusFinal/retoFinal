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


//esto es una prueba para ver el header
Route::get('/index', function () {
    return view('index');
});


Route::get('/create/pregunta', 'PreguntaController@create');

Route::post('/pregunta','PreguntaController@store');

