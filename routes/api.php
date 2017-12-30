<?php

use Illuminate\Http\Request;
use App\Marca;
use App\Http\Resources\User as UserResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/utilizador', 'UserController@verUtilizadorAPI');
Route::get('/marcas', function() {
    return Marca::all();
});
Route::get('/carro/pesquisar', 'CarController@pesquisarCarroAPI');