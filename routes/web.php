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
<<<<<<< HEAD
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
    
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/casa', 'HomeController@index')->name('home');
>>>>>>> 4add309d564b772aec646decbc534e949b13080c
