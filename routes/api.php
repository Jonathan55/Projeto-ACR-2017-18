<?php

use Illuminate\Http\Request;
use App\User;
use App\Carro;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    echo $request->user();
});

Route::middleware('auth:api')->get('/users', function() {
    return User::all();
});

Route::get('/carros', function() {
    return Carro::with(['marca','user'])->get();
});

Route::get('/marcas', function() {
    return Marca::with(['carros'])->get();
});