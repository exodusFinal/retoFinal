<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function pregunta()
    {
        return $this->hasMany('App\Pregunta');
    }
    public function favorito()
    {
        return $this->hasMany('App\Favorito');
    }
    public function preguntas_users()
    {
        return $this->hasMany('App\Preguntas_Users');
    }
    public function respuestas_users()
    {
        return $this->hasMany('App\respuestas_users');
    }

}
