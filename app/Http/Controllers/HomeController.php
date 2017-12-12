<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Marca;
use App\Carro;

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
        $carros = Carro::with(['marca','user'])->get();
        //$carros = Carro::all();
        $marcas = Marca::all();
        //$max_preco = DB::table('carros')->max('price');
        //$min_preco = DB::table('carros')->min('price');

        return view('home', compact('carros','marcas'));

    }
}
