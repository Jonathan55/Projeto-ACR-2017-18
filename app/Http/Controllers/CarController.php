<?php

namespace App\Http\Controllers;

use App\Carro;
use App\FotoCarro;
use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function verCarro($id)
    {
        $carro = Carro::with(['marca', 'user'])->findOrFail($id);
        $carro->visualizacoes++;
        $carro->save();
        $user = Auth::user();
        if ($user && $carro->user->id != $user->id) {
            $user->carros_vistos()->attach($carro);
        }
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

        $rules = [
            'modelo' => 'required',
            'fotos' => 'required|min:1',
            'quilometros' => 'required|int',
            'ano' => 'required|int',
            'preco' => 'required|numeric',
            'cilindrada' => 'nullable|int',
            'potencia' => 'nullable|int',
            'quantidade' => 'required|int|min:1',
            'lugares' => 'nullable|int',
            'cor' => 'nullable|alpha',
            'caixa' => 'required|in:Manual,Automática,Semi-Automática',
            'combustivel' => 'required|in:Gasolina,Diesel',
            'usado' => 'required',
        ];

        $errors = new MessageBag();
        if ($request->usado == 1 && $request->quilometros == 0) {
            $errors->add('quilometros','Com o estado usado, deve introduzir os quilometros');
            return redirect()->route('adicionarCarro')->withInput()->withErrors($errors);
        }
        if ($request->usado == 0 && $request->quilometros > 0) {
            $errors->add('quilometros','Com o estado novo, o campo quilometros deve ser 0');
            return redirect()->route('adicionarCarro')->withInput()->withErrors($errors);
        }

        $fotos_count = count($request->fotos);
        foreach (range(0, $fotos_count) as $index) {
            $rules['fotos.' . $index] = 'image';
        }

        $validatedData = $request->validate($rules);

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
        $carro->visualizacoes = 0;
        $user->carros()->save($carro);

        // Fotos
        foreach ($request->fotos as $foto) {
            $foto_carro = new FotoCarro();
            $foto_carro->path = $foto->store('carros', 'public');
            $carro->fotos()->save($foto_carro);
        }

        return redirect()->route('verCarro', $carro->id);
    }

    public function pesquisarCarro(Request $request)
    {
        /*
        // Valores Home
        $carros_mais_vistos = Carro::with(['marca', 'user', 'fotos'])->orderBy('visualizacoes','desc')->take(3)->get();
        $carros_mais_recentes = Carro::with(['marca', 'user', 'fotos'])->orderBy('created_at', 'desc')->take(3)->get();
        $marcas = Marca::all();
        $preco_min = Carro::min('preco');
        $preco_max = Carro::max('preco');
        $ano_min = Carro::min('ano');
        $ano_max = Carro::max('ano');
        $quilometros_min = Carro::min('quilometros');
        $quilometros_max = Carro::max('quilometros');
        */

        // Pesquisa
        $marca = Marca::findOrFail($request->marca);
        $validatedData = $request->validate([
            'marca' => 'required',
            'preco_min' => 'numeric',
            'preco_max' => 'numeric',
            'ano_min' => 'int',
            'ano_max' => 'int',
            'quilometros_min' => 'int',
            'quilometros_max' => 'int',
        ]);

        $estado = is_null($request->estado) ? [0, 1] : [$request->estado];
        $preco_min = $request->preco_min ?: Carro::min('preco');
        $preco_max = $request->preco_max ?: Carro::max('preco');
        $ano_min = $request->ano_min ?: Carro::min('ano');
        $ano_max = $request->ano_max ?: Carro::max('ano');
        $quilometros_min = $request->quilometros_min ?: Carro::min('quilometros');
        $quilometros_max = $request->quilometros_max ?: Carro::max('quilometros');

        $carros = Carro::with(['marca', 'user'])
            ->where('marca_id', $marca->id)
            ->whereIn('usado', $estado)
            ->whereBetween('preco', [$preco_min, $preco_max])
            ->whereBetween('ano', [$ano_min, $ano_max])
            ->whereBetween('quilometros', [$quilometros_min, $quilometros_max])
            ->orderBy($request->ordenar, $request->ordem)
            ->get();
        return $carros;
    }

    public function formEditarCarro($id)
    {
        $carro = Carro::findOrFail($id);
        $marcas = Marca::all();
        $user = Auth::user();
        if ($carro->user->id == $user->id) {
            return view('editarCarro', compact('carro', 'marcas'));

        } else {
            abort(404);

        }

    }

    public function editarCarro(Request $request, $id)
    {
        $user = Auth::user();
        $carro = Carro::findOrFail($id);
        $marca = Marca::findOrFail($request->marca);

        if ($carro->user->id == $user->id) {
            $validatedData = $request->validate([
                'modelo' => 'required',
                'quilometros' => 'required|int',
                'ano' => 'required|int',
                'preco' => 'required|numeric',
                'cilindrada' => 'nullable|int',
                'potencia' => 'nullable|int',
                'quantidade' => 'required|int|min:1',
                'lugares' => 'nullable|int',
                'cor' => 'nullable|alpha',
                'caixa' => 'required|in:Manual,Automática,Semi-Automática',
                'combustivel' => 'required|in:Gasolina,Diesel',
                'usado' => 'required',
            ]);

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

            $carro->save();

            return redirect()->route('verCarro', $carro->id);

        } else {
            abort(404);
        }

    }

    public function adicionarCarrinho($id)
    {
        $user = Auth::user();
        $carro = Carro::findOrFail($id);
        // Não pode adicionar os seus proprios carros
        if ($carro->user->id != $user->id) {
            $user->carrinho_compras()->attach($carro);
        }
        return back();
    }

    public function eliminarCarrinho($id)
    {
        $user = Auth::user();
        $carro = Carro::findOrFail($id);
        DB::table('carrinho_compras')
            ->where('user_id', $user->id)
            ->where('carro_id', $carro->id)
            ->limit(1)
            ->delete();
        return back();
    }

    public function adicionarFotos(Request $request, $carro_id)
    {
        $user = Auth::user();
        $carro = Carro::findOrFail($carro_id);
        // Verificar se o carro pertence ao utilizador
        if ($carro->user->id == $user->id) {

            // Validação
            $rules = [];
            $fotos_count = count($request->fotos);
            foreach (range(0, $fotos_count) as $index) {
                $rules['fotos.' . $index] = 'image';
            }
            $validatedData = $request->validate($rules);

            // Fotos
            foreach ($request->fotos as $foto) {
                $foto_carro = new FotoCarro();
                $foto_carro->path = $foto->store('carros', 'public');
                $carro->fotos()->save($foto_carro);
            }
            return redirect()->route('verCarro', $carro->id);

        } else {
            abort(404);
        }
    }

    public function eliminarFoto(Request $request, $carro_id, $foto_id)
    {
        $user = Auth::user();
        $carro = Carro::findOrFail($carro_id);
        // Verificar se o carro pertence ao utilizador
        if ($carro->user->id == $user->id) {

            // Só pode apagar se tiver mais que uma foto
            if ($carro->fotos->count() > 1) {

                $foto_carro = FotoCarro::findOrFail($foto_id);
                // Verificar se a foto pertence ao carro
                if ($foto_carro->carro_id == $carro->id) {

                    Storage::disk('public')->delete($foto_carro->path);
                    $foto_carro->delete();

                } else {
                    abort(404);
                }

            }

            return redirect()->route('verCarro', $carro->id);

        } else {
            abort(404);
        }
    }
    public function verCarrinho()
    {
        return view('carrinho');
    }

}
