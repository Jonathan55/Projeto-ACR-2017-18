<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function user()
    {
    	return $this->belongsTo(App\User);

    }

    public function carrosComprados()
    {
    	return $this->hasMany(App\CarroComprado);
    }
}
