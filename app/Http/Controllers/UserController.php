<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function cerrarSesion(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function show()
    {
        //

        $usuario  = Auth::id();
        $users = User::find($usuario);


        return view('perfil',compact('users'));

    }
}
