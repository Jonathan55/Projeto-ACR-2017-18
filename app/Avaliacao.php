<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacoes';

    public function user()
    {
    	return $this->belongsTo('App\User');

    }

}
