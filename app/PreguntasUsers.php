<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntasUsers extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }
}
