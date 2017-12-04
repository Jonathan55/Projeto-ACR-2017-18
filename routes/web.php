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
    return view('home');
});

Route::get('/carro/adicionar', 'CarController@formAdicionarCarro');

Route::get('/marca/{marca}', 'CarController@verMarca');

Route::get('/carro/{id}', 'CarController@verCarro');

Route::get('/carro/pesquisa', 'CarController@pesquisarCarro');

Route::post('/carro', 'CarController@adicionarCarro');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
Slider mais recentes
Mais vistos
*/