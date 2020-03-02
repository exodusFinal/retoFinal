<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Preguntas_Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PreguntasUsersController extends Controller
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
        $existePuntos = Preguntas_Users::where('user_id', Auth::id())->where('pregunta_id', request('id'))->get()->first();

        if ($existePuntos == null){
            $pregunta = Pregunta::find(request('id'));

            $pregunta->puntuacionPregu = $pregunta->puntuacionPregu +1;

            $pregunta->save();

            $puntos = new Preguntas_Users();
            $puntos->user_id = Auth::id();
            $puntos->pregunta_id = request('id');
            $puntos->save();
            return $pregunta;

        }else{
            Preguntas_Users::destroy($existePuntos->id);
            $pregunta = Pregunta::find(request('id'));
            $pregunta->puntuacionPregu = $pregunta->puntuacionPregu -1;
            $pregunta->save();
            return $pregunta;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preguntas_Users  $preguntas_users
     * @return \Illuminate\Http\Response
     */
    public function show(Preguntas_Users $preguntas_users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preguntas_Users  $preguntas_users
     * @return \Illuminate\Http\Response
     */
    public function edit(Preguntas_Users $preguntas_users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preguntas_Users  $preguntas_users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preguntas_Users $preguntas_users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preguntas_Users  $preguntas_users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preguntas_Users $preguntas_users)
    {
        //
    }
}
