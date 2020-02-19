<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    public function pregunta()
    {
        return $this->hasMany('App\Pregunta');
    }
}
