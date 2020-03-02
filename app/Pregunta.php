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

    public function scopeTitulo($query,$titulo){
        if($titulo!=null)

            return $query->Where('titulo','LIKE', "%$titulo%");

    }

    public function scopeTema_id($query,$tema_id){
        if($tema_id!=null)

            return $query->Where('tema_id','=', "$tema_id");

    }

}
