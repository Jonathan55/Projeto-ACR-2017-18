<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

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
        'password', 'remember_token',
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

    public function carrosRecomendados()
    {
      /*  $user_id = $this->id;
        $carros_recomendados = DB::table('carros_vistos')
                        ->selectRaw('count(marca_id), marca_id')
                        ->join('carros', 'carros.id', '=', 'carros_vistos.carro_id')
                        ->where('carros_vistos.user_id', '=', $user_id)
                        ->groupBy('carros.marca_id')
                        ->get();
        return $carros_recomendados;

       DB::raw("SELECT COUNT(marca_id), marca_id FROM `carros_vistos` JOIN carros ON carros.id=carros_vistos.carro_id WHERE carros_vistos.user_id=$user_id GROUP BY carros.marca_id"); */
       return [];
    }
}
