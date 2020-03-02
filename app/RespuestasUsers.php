<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestasUsers extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function respuesta()
    {
        return $this->belongsTo('App\Respuesta');
    }
}
