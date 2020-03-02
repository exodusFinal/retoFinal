<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function RespuestasUsers()
    {
        return $this->hasMany('App\RespuestasUsers');
    }
}
