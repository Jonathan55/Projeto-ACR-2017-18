<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
<<<<<<< HEAD
use App\Carro;
=======
>>>>>>> 67eb5471049ff56eb3035cee2ada778071259e64

class CarController extends Controller
{

    public function formAdicionarCarro(Request $request) {
        $marcas = Marca::all();
        //return view('adicionarCarro', compact('marcas'));
        dd($marcas);
    }

<<<<<<< HEAD
    public function verCarro($id) {
    	$carro = Carro::find($id);
    	if($carro){
    		return "Existe o Carro";

    	}else{
    		return "Id incorreto";

    	}
        
    }

    public function verMarca($marca_id) {
    	$marca = Marca::find($marca_id);
    	if($marca){
    		//return "Marca do carro";
    		dd($marca->carros());

    	}else{
    		"Não existe essa marca!";
    	}


=======
    public function verCarro(Request $request) {
        return 'verCarro';
>>>>>>> 67eb5471049ff56eb3035cee2ada778071259e64
    }

}
