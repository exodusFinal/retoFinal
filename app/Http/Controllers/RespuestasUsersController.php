<?php

namespace App\Http\Controllers;

use App\Respuesta;
use App\Respuestas_Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespuestasUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existePuntos = Respuestas_Users::where('user_id', Auth::id())->where('respuesta_id', request('id'))->get()->first();

        if ($existePuntos == null){
            $respuesta = Respuesta::find(request('id'));

            $respuesta->puntosResp = $respuesta->puntosResp +1;

            $respuesta->save();

            $puntos = new Respuestas_Users();
            $puntos->user_id = Auth::id();
            $puntos->respuesta_id = request('id');
            $puntos->save();
            return $respuesta;

        }else{
            Respuestas_Users::destroy($existePuntos->id);
            $respuesta = Respuesta::find(request('id'));
            $respuesta->puntosResp = $respuesta->puntosResp -1;
            $respuesta->save();
            return $respuesta;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Respuestas_Users  $respuestas_Users
     * @return \Illuminate\Http\Response
     */
    public function show(Respuestas_Users $respuestas_Users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Respuestas_Users  $respuestas_Users
     * @return \Illuminate\Http\Response
     */
    public function edit(Respuestas_Users $respuestas_Users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Respuestas_Users  $respuestas_Users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuestas_Users $respuestas_Users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Respuestas_Users  $respuestas_Users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respuestas_Users $respuestas_Users)
    {
        //
    }
}
