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

<<<<<<< HEAD
Route::get('/marca/{marca_id}', 'CarController@verMarca');
=======
Route::get('/anuncio/criar', function () {
    return view('criarAnuncio');
});

Route::get('/carro/adicionar', 'CarController@formAdicionarCarro');

Route::get('/marca/{marca}', 'CarController@verMarca');
>>>>>>> 67eb5471049ff56eb3035cee2ada778071259e64

Route::get('/carro/{id}', 'CarController@verCarro');

Route::get('/carro/pesquisa', 'CarController@pesquisarCarro');

Route::post('/carro', 'CarController@adicionarCarro');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
Slider mais recentes
Mais vistos
*/