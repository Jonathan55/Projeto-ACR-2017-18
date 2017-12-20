<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoCarro extends Model
{
    protected $table = 'fotos_carros';

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function carro() {
        return $this->belongsTo('App\Carro');
    }
}
