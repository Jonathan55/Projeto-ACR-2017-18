<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarroComprado extends Model
{
    protected $table = 'carros_comprados';

    public function compra()
    {
    	return $this->belongsTo('App\Compra');
    }
}
