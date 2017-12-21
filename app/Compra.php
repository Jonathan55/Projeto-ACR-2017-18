<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{

    public function carros_comprados()
    {
    	return $this->hasMany('App\CarroComprado');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');

    }

}
