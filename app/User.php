<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'facebook_id', 'deleted_at'
    ];

    public function carros()
    {
        return $this->hasMany('App\Carro');
    }

    public function carrinho_compras()
    {
        return $this->belongsToMany('App\Carro', 'carrinho_compras', 'user_id', 'carro_id');
    }

    public function carros_vistos()
    {
        return $this->belongsToMany('App\Carro', 'carros_vistos', 'user_id', 'carro_id');
    }

    public function carros_recomendados()
    {   
        // Três Marcas (ids) mais vistas
        $marcas = DB::table('carros_vistos')
            ->selectRaw('count(marca_id) as visualizacoes, marca_id')
            ->join('carros', 'carros.id', '=', 'carros_vistos.carro_id')
            ->where('carros_vistos.user_id', '=', $this->id)
            ->groupBy('carros.marca_id')
            ->orderBy('visualizacoes','desc')
            ->limit(3)
            ->get();
        
        // Preço mínimo visto
        $preco_min = DB::table('carros_vistos')
            ->selectRaw('min(preco) as preco')
            ->join('carros', 'carros.id', '=', 'carros_vistos.carro_id')
            ->where('carros_vistos.user_id', '=', $this->id)
            ->get();

        // Preço máximo visto
        $preco_max = DB::table('carros_vistos')
            ->selectRaw('max(preco) as preco')
            ->join('carros', 'carros.id', '=', 'carros_vistos.carro_id')
            ->where('carros_vistos.user_id', '=', $this->id)
            ->get();

        $pesquisa = [
            'marcas_ids' => $marcas->map(function($item){ return $item->marca_id; })->toArray(),
            'preco_min' => $preco_min[0]->preco,
            'preco_max' => $preco_max[0]->preco
        ];

        return Carro::whereIn('marca_id', $pesquisa['marcas_ids'])
            ->whereBetween('preco', [ $pesquisa['preco_min'], $pesquisa['preco_max'] ])
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    }

    public function compras()
    {
        return $this->hasMany('App\Compra');
    }

    public function carros_vendidos()
    {
        return $this->hasMany('App\CarroComprado');
    }

    public function avaliar()
    {
        return $this->hasMany('App\Avaliacao');
    }
}
