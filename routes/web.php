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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/carro/adicionar', 'CarController@formAdicionarCarro')->name('formAdicionarCarro')->middleware('auth');
Route::post('/carro/adicionar', 'CarController@adicionarCarro')->name('adicionarCarro')->middleware('auth');
Route::get('/carro/{id}', 'CarController@verCarro')->name('verCarro');
Route::get('/pesquisa', 'CarController@pesquisarCarro')->name('pesquisarCarro');
Route::get('/utilizador/{id}', 'UserController@verUtilizador')->name('verUtilizador');
Route::get('/admin', 'UserController@verAdmin')->name('verAdmin');

Route::get('/facebook/login/{access_token}', 'UserController@facebookLogin');


Auth::routes();