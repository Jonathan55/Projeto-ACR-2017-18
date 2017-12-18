<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarroComprado extends Model
{
    public function compra()
    {
    	return $this->belongsTo(App\Compra);
    }

    
}
