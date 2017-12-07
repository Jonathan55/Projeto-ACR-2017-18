<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    
    public function marca()
    {
        return $this->hasOne('App\Marca');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
