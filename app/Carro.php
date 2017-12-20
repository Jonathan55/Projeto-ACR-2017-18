<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    
    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function fotos()
    {
        return $this->hasMany('App\FotoCarro');
    }

}
