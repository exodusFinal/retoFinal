<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tema()
    {
        return $this->belongsTo('App\Tema');
    }
    public function respuesta()
    {
        return $this->hasMany('App\Respuesta');
    }
    public function favorito()
    {
        return $this->hasMany('App\Favorito');
    }

}
