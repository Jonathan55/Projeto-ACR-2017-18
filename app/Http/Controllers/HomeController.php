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
        $carros = Carro::with(['marca', 'user'])->get();
        $marcas = Marca::all();
        $preco_minimo = DB::table('carros')->min('preco');
        $preco_maximo = DB::table('carros')->max('preco');
        $ano_minimo = DB::table('carros')->min('ano');
        $ano_maximo = DB::table('carros')->max('ano');
        $quilometros_minimo = DB::table('carros')->min('quilometros');
        $quilometros_maximo = DB::table('carros')->max('quilometros');
        return view('home', compact(
            'carros',
            'marcas',
            'preco_maximo',
            'preco_minimo',
            'ano_minimo',
            'ano_maximo',
            'quilometros_minimo',
            'quilometros_maximo'
        ));
        
    }
}
