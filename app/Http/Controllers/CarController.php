<?php

namespace App\Http\Controllers;

use App\Carro;
use App\CarroComprado;
use App\Compra;
use App\FotoCarro;
use App\Marca;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Validator;

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
            $errors->add('quilometros', 'Com o estado usado, deve introduzir os quilometros');
            return redirect()->route('adicionarCarro')->withInput()->withErrors($errors);
        }
        if ($request->usado == 0 && $request->quilometros > 0) {
            $errors->add('quilometros', 'Com o estado novo, o campo quilometros deve ser 0');
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
        $validatedData = $request->validate([
            'marca' => 'required',
            'preco_min' => 'numeric',
            'preco_max' => 'numeric',
            'ano_min' => 'int',
            'ano_max' => 'int',
            'quilometros_min' => 'int',
            'quilometros_max' => 'int',
        ]);

        $carros_mais_vistos = Carro::with(['marca', 'user', 'fotos'])->orderBy('visualizacoes', 'desc')->take(3)->get();
        $marcas = Marca::all();

        // Valores do formulário ou da Base de Dados
        $estado = is_null($request->estado) ? [0, 1] : [$request->estado];
        $marca_escolhida = Marca::findOrFail($request->marca);
        $preco_min = $request->preco_min ?: Carro::min('preco');
        $preco_max = $request->preco_max ?: Carro::max('preco');
        $ano_min = $request->ano_min ?: Carro::min('ano');
        $ano_max = $request->ano_max ?: Carro::max('ano');
        $quilometros_min = $request->quilometros_min ?: Carro::min('quilometros');
        $quilometros_max = $request->quilometros_max ?: Carro::max('quilometros');
        $ordenar = $request->ordenar ?: 'preco';
        $ordem = $request->ordem ?: 'ASC';

        $carros_pesquisados = Carro::with(['marca', 'user', 'fotos'])
            ->where('marca_id', $marca_escolhida->id)
            ->whereIn('usado', $estado)
            ->whereBetween('preco', [$preco_min, $preco_max])
            ->whereBetween('ano', [$ano_min, $ano_max])
            ->whereBetween('quilometros', [$quilometros_min, $quilometros_max])
            ->orderBy($ordenar, $ordem)
            ->get();

        return view('pesquisa', compact(
            'carros_mais_vistos',
            'carros_pesquisados',
            'marcas',
            'preco_max',
            'preco_min',
            'ano_min',
            'ano_max',
            'quilometros_min',
            'quilometros_max',
            'marca_escolhida',
            'ordenar',
            'ordem',
            'estado'
        ));
    }

    public function pesquisarCarroAPI(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'marca_id' => 'int',
            'preco_min' => 'numeric',
            'preco_max' => 'numeric',
            'ano_min' => 'int',
            'ano_max' => 'int',
            'quilometros_min' => 'int',
            'quilometros_max' => 'int',
        ]);

        if ($validator->fails()) {
            return response()->json(['erro' => $validator->errors()->first()], 401);
        }

        $todas_marcas_ids = Marca::all()->map(function ($marca) {
            return $marca->id;
        });

        $marca_id_escolhida = $request->marca_id ? [(int) $request->marca_id] : $todas_marcas_ids;

        $preco_min = $request->preco_min ?: Carro::min('preco');
        $preco_max = $request->preco_max ?: Carro::max('preco');
        $ano_min = $request->ano_min ?: Carro::min('ano');
        $ano_max = $request->ano_max ?: Carro::max('ano');
        $quilometros_min = $request->quilometros_min ?: Carro::min('quilometros');
        $quilometros_max = $request->quilometros_max ?: Carro::max('quilometros');
        $ordenar = $request->ordenar ?: 'preco';
        $ordem = $request->ordem ?: 'ASC';

        $carros_pesquisados = Carro::with(['marca', 'user', 'fotos'])
            ->whereIn('marca_id', $marca_id_escolhida)
            ->whereBetween('preco', [$preco_min, $preco_max])
            ->whereBetween('ano', [$ano_min, $ano_max])
            ->whereBetween('quilometros', [$quilometros_min, $quilometros_max])
            ->orderBy($ordenar, $ordem)
            ->get();

        return response()->json($carros_pesquisados);
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
            $rules = [
                'fotos' => 'required|min:1',
            ];
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

    public function comprar()
    {
        $user = Auth::user();
        $carros = $user->carrinho_compras;
        if ($carros->count() == 0) {
            $errors = new MessageBag();
            $errors->add('ERRO', 'Não existem carros no carrinho de compras.');
            return redirect()->route('verCarrinho')->withErrors($errors);
        }
        DB::beginTransaction();
        $compra = new Compra();
        $user->compras()->save($compra);
        foreach ($carros as $carro) {
            // Obter o carro novamente da base de dados para ter a quantidade atualizada
            $carro = Carro::findOrFail($carro->id);
            if ($carro->quantidade > 0) {
                $carro->quantidade--;
                $carro->save();
                $carroComprado = new CarroComprado();
                $carroComprado->carro_id = $carro->id;
                $carroComprado->preco = $carro->preco;
                $carroComprado->marca = $carro->marca->marca;
                $carroComprado->modelo = $carro->modelo;
                $carroComprado->name = $carro->user->name;
                $carroComprado->email = $carro->user->email;
                $carroComprado->user_id = $carro->user->id;
                $compra->carros_comprados()->save($carroComprado);
                // Eliminar do carrinho
                DB::table('carrinho_compras')
                    ->where('user_id', $user->id)
                    ->where('carro_id', $carro->id)
                    ->limit(1)
                    ->delete();
            } else {
                DB::rollback();
                $errors = new MessageBag();
                $errors->add('ERRO', 'O utilizador ' . $carro->user->name . ' não tem a quantidade suficiente de carros ' . $carro->marca->marca . ' ' . $carro->modelo . '.');
                return redirect()->route('verCarrinho')->withErrors($errors);
            }
        }
        DB::Commit();
        return redirect()->route('verRecibo', $compra->id);
    }

    public function verRecibo($compra_id)
    {

        $user = Auth::user();
        $compra = Compra::with(['user', 'carros_comprados'])->findOrFail($compra_id);

        return view('recibo', compact('compra'));

    }

    public function adicionarCarroAPI(Request $request)
    {
        // Verificar Utilizador
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['erro' => 'Access-Token inválido.'], 401);
        }

        // Verificar Marca
        $marca = Marca::find($request->marca);
        if (!$marca) {
            return response()->json(['erro' => 'A marca_id escolhida não existe.'], 400);
        }

        // Validações
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

        if ($request->usado == 1 && $request->quilometros == 0) {
            $errors = new MessageBag();
            $errors->add('quilometros', 'Com o estado usado, deve introduzir os quilometros');
            return response()->json(['erro' => $errors->first()], 400);
        }
        if ($request->usado == 0 && $request->quilometros > 0) {
            $errors = new MessageBag();
            $errors->add('quilometros', 'Com o estado novo, o campo quilometros deve ser 0');
            return response()->json(['erro' => $errors->first()], 400);
        }

        $fotos_count = count($request->fotos);
        foreach (range(0, $fotos_count) as $index) {
            $rules['fotos.' . $index] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['erro' => $validator->errors()->first()], 400);
        }

        // Sem problemas
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

        return response()->json($carro, 201);
    }

    public function eliminarCarro($carro_id) {
        $user = Auth::user();
        $carro = Carro::findOrFail($carro_id);
        if ($carro->user->id == $user->id) {
            $carro->delete();
            return redirect('/');
        } else abort(404);
    }

}
