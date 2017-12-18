<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Carro;
use App\Marca;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros_mais_vistos = Carro::with(['marca', 'user'])->orderBy('visualizacoes','desc')->take(3)->get();
        $carros_mais_recentes = Carro::with(['marca', 'user'])->orderBy('created_at', 'desc')->take(3)->get();
        $marcas = Marca::all();
        $preco_min = Carro::min('preco');
        $preco_max = Carro::max('preco');
        $ano_min = Carro::min('ano');
        $ano_max = Carro::max('ano');
        $quilometros_min = Carro::min('quilometros');
        $quilometros_max = Carro::max('quilometros');
        return view('home', compact(
            'carros_mais_vistos',
            'carros_mais_recentes',
            'marcas',
            'preco_max',
            'preco_min',
            'ano_min',
            'ano_max',
            'quilometros_min',
            'quilometros_max'
        ));
        
    }
}
