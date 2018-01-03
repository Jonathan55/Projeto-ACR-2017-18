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
Route::get('/carros/pesquisa', 'CarController@pesquisarCarro')->name('pesquisarCarro');
Route::get('/utilizador/{id}', 'UserController@verUtilizador')->name('verUtilizador');
Route::get('/admin', 'UserController@verAdmin')->name('verAdmin');
Route::get('/carro/{id}/editar', 'CarController@formEditarCarro')->name('formEditarCarro')->middleware('auth');
Route::post('/carro/{id}/editar', 'CarController@editarCarro')->name('editarCarro')->middleware('auth');
Route::get('/carro/{id}/adicionar/carrinho/', 'CarController@adicionarCarrinho')->name('adicionarCarrinho')->middleware('auth');
Route::get('/carro/{id}/eliminar/carrinho/', 'CarController@eliminarCarrinho')->name('eliminarCarrinho')->middleware('auth');
Route::post('/carro/{carro_id}/fotos/adicionar', 'CarController@adicionarFotos')->name('adicionarFotos')->middleware('auth');
Route::get('/carro/{carro_id}/foto/{foto_id}/eliminar', 'CarController@eliminarFoto')->name('eliminarFoto')->middleware('auth');
Route::get('/marca/eliminar', 'UserController@eliminarMarca')->name('eliminarMarca')->middleware('auth');
Route::get('/marca/adicionar', 'UserController@adicionarMarca')->name('adicionarMarca')->middleware('auth');
Route::get('/user/eliminar', 'UserController@eliminarUser')->name('eliminarUser')->middleware('auth');
Route::get('/carrinho', 'CarController@verCarrinho')->name('verCarrinho')->middleware('auth');
Route::get('/carrinho/comprar', 'CarController@comprar')->name('comprar')->middleware('auth');
Route::get('/compra/{compra_id}', 'CarController@verRecibo')->name('verRecibo')->middleware('auth');
Route::post('/utilizador/{user_id}/avaliar', 'UserController@avaliar')->name('avaliar')->middleware('auth');
Route::get('/utizador/{user_id}/avaliacoes', 'UserController@verAvaliacoes')->name('verAvaliacoes')->middleware('auth');
Route::get('/carro/{carro_id}/eliminar', 'CarController@eliminarCarro')->name('eliminarCarro')->middleware('auth');
Route::get('/facebook/login/{access_token}', 'UserController@facebookLogin');
Route::get('/utilizar/compras_vendas', 'UserController@verComprasVendas')->name('verComprasVendas')->middleware('auth');


Auth::routes();