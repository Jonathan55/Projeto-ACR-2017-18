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

    public function from_user()
    {
        return $this->belongsTo('App\User', 'from_user_id');
    }

}
