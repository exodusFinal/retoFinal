<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }

}
