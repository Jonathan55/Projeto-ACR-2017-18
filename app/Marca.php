<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    
    public function carros() {
        return $this->belongsToMany('App\Carro');
    }
    
}
