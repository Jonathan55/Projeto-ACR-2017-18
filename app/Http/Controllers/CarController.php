<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;

class CarController extends Controller
{

    public function formAdicionarCarro(Request $request) {
        $marcas = Marca::all();
        //return view('adicionarCarro', compact('marcas'));
        dd($marcas);
    }

    public function verCarro(Request $request) {
        return 'verCarro';
    }

}
