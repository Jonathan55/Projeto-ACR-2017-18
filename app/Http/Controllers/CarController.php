<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function formAdicionarCarro(Request $request) {
        $marcas = Marca::all();
        return view('adicionarCarro', compact('marcas'));
    }

    public function adicionarCarro(Request $request) {
        $marca = Marca::find($request->marca);

        $user = Auth::user();
        // Implementar MultiFoto
        $foto = $request->file('foto')->store('carros', 'public');
        $carro = new Carro;
        $carro->modelo = $request->modelo;
        $carro->preco = $request->preco;
        $carro->foto = $foto;
        //$carro->marca()->associate($marca);
        $user->carros()->save($carro);
        // $carro->marca($marca);
     
        
        return redirect("/");
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

}
