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
Route::get('/carro/editar/{id}', 'CarController@formEditarCarro')->name('formEditarCarro')->middleware('auth');
Route::post('/carro/editar/{id}', 'CarController@editarCarro')->name('editarCarro')->middleware('auth');
Route::get('/carro/adicionar/carrinho/{id}', 'CarController@adicionarCarrinho')->name('adicionarCarrinho')->middleware('auth');
Route::get('/carro/eliminar/carrinho/{id}', 'CarController@eliminarCarrinho')->name('eliminarCarrinho')->middleware('auth');

Auth::routes();


/*
Slider mais recentes
Mais vistos
*/