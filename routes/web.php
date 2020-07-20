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

Auth::routes();

Route::view('/', 'index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/crear-contacto', 'ContactController@create');
Route::post('/crear-contacto', 'ContactController@store');
Route::get('/foto/{fileimage}', 'HomeController@getImage');
Route::get('/actualizar-contacto/{iduser}', 'ContactController@edit');
Route::post('/actualizar-contacto/{iduser}', 'ContactController@update');
Route::get('/eliminar-contacto/{iduser}', 'ContactController@destroy');