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
            'foto' => 'required|image'
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
        $carros = Carro::with(['marca', 'user'])
                        ->where('marca_id', $marca->id)
                        ->whereBetween('preco', [$request->preco_min, $request->preco_max])
                        ->whereBetween('ano', [$request->ano_min, $request->ano_max])
                        ->whereBetween('quilometros', [$request->quilometros_min, $request->quilometros_max])
                        ->orderBy($request->ordenar, $request->ordem)
                        ->get();
        return $carros;
    }

}
