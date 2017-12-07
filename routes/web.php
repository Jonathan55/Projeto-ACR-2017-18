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

Auth::routes();


/*
Slider mais recentes
Mais vistos
*/