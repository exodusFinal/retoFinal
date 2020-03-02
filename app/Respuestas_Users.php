<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestas_Users extends Model
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
