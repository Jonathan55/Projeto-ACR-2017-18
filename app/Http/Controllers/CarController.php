<?php

namespace App\Http\Controllers;

use App\Carro;
use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{

    public function verCarro($id)
    {
        $carro = Carro::find($id);
        if ($carro) {
            return "Existe o Carro";
        } else {
            return "Id incorreto";
        }
    }

    public function formAdicionarCarro(Request $request)
    {
        $marcas = Marca::all();
        return view('adicionarCarro', compact('marcas'));
    }

    public function adicionarCarro(Request $request)
    {
        $user = Auth::user();
        $marca = Marca::findOrFail($request->marca);

        $validatedData = $request->validate([
                'modelo' => 'required',
                
        ]);

        $carro = new Carro;
        $carro->modelo = $request->modelo;
        $carro->preco = $request->preco;
        $carro->cor = $request->cor;
        $carro->quantidade = $request->quantidade;
        $carro->ano = $request->ano;
        $carro->potencia = $request->potencia;
        $carro->cilindrada = $request->cilindrada;
        $carro->lugares = $request->lugares;
        $carro->combustivel = $request->combustivel;
        $carro->usado = $request->usado;
        $carro->quilometros = $request->quilometros;
        $carro->descricao = $request->descricao;
        $carro->caixa = $request->caixa;
        $carro->visualizacoes=0;
        $carro->foto = $request->file('foto')->store('carros', 'public');
        $carro->marca()->associate($marca);
        $user->carros()->save($carro);

        return redirect("/");
    }

    public function verMarca($marca_id)
    {
        $marca = Marca::find($marca_id);
        if ($marca) {
            //return "Marca do carro";
            dd($marca->carros());
        } else {
            "Não existe essa marca!";
        }
    }

}
