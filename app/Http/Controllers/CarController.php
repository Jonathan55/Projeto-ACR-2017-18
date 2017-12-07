<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Carro;


class CarController extends Controller
{



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


}
