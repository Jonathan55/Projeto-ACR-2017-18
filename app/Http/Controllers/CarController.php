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
        $carro = Carro::with(['marca','user'])->findOrFail($id);
        $carro->visualizacoes++;
        $carro->save();
        return view('anunciodet', compact('carro'));
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
            'foto' => 'required|image',
            'quilometros'=> 'required|int',
            'ano' => 'required|int',
            'preco' => 'required|numeric',
            'cilindrada' => 'int',
            'potencia' => 'int',
            'quantidade' => 'required|int|min:1',
            'lugares' => 'int',
            'cor' => 'alpha',
            'caixa' => 'required',
            'combustivel' => 'required',
            'usado' => 'required'
        ]);

        $carro = new Carro;

        $carro->marca()->associate($marca);
        $carro->modelo = $request->modelo;
        $carro->combustivel = $request->combustivel;
        $carro->quilometros = $request->quilometros;
        $carro->potencia = $request->potencia;
        $carro->cilindrada = $request->cilindrada;
        $carro->preco = $request->preco;
        $carro->usado = $request->usado;
        $carro->ano = $request->ano;
        $carro->lugares = $request->lugares;
        $carro->quantidade = $request->quantidade;
        $carro->cor = $request->cor;
        $carro->caixa = $request->caixa;
        $carro->descricao = $request->descricao;
        $carro->foto = $request->file('foto')->store('carros', 'public');
        $carro->visualizacoes=0;

        $user->carros()->save($carro);

        return redirect("/");
    }

    public function pesquisarCarro(Request $request)
    {
        $marca = Marca::findOrFail($request->marca);

        $validatedData = $request->validate([
            'marca' => 'required',
            'preco_min' => 'numeric',
            'preco_max'=> 'numeric',
            'ano_min' => 'int',
            'ano_max' => 'int',
            'quilometros_min' => 'int',
            'quilometros_max' => 'int'
            
        ]);

        $preco_min = $request->preco_min ? : Carro::min('preco');
        $preco_max = $request->preco_max ? : Carro::max('preco');
        $ano_min = $request->ano_min ? : Carro::min('ano');
        $ano_max = $request->ano_max ? : Carro::max('ano');
        $quilometros_min = $request->quilometros_min ? : Carro::min('quilometros');
        $quilometros_max = $request->quilometros_max ? : Carro::max('quilometros');

        
        $carros = Carro::with(['marca', 'user'])
                        ->where('marca_id', $marca->id)
                        ->whereBetween('preco', [$preco_min, $preco_max])
                        ->whereBetween('ano', [$ano_min, $ano_max])
                        ->whereBetween('quilometros', [$quilometros_min, $quilometros_max])
                        ->orderBy($request->ordenar, $request->ordem)
                        ->get();
        return $carros;
    }

}
