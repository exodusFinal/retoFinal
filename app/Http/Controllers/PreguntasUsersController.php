<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\PreguntasUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $existePuntos = PreguntasUsers::where('user_id', Auth::id())->where('pregunta_id', request('id'))->get()->first();

        if ($existePuntos == null){
            $pregunta = Pregunta::find(request('id'));

            $pregunta->puntuacionPregu = $pregunta->puntuacionPregu +1;

            $pregunta->save();

            $puntos = new PreguntasUsers();
            $puntos->user_id = Auth::id();
            $puntos->pregunta_id = request('id');
            $puntos->save();
            return $pregunta;

        }else{
            PreguntasUsers::destroy($existePuntos->id);
            $pregunta = Pregunta::find(request('id'));
            $pregunta->puntuacionPregu = $pregunta->puntuacionPregu -1;
            $pregunta->save();
            return $pregunta;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PreguntasUsers  $preguntasUsers
     * @return \Illuminate\Http\Response
     */
    public function show(PreguntasUsers $preguntasUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PreguntasUsers  $preguntasUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(PreguntasUsers $preguntasUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreguntasUsers  $preguntasUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreguntasUsers $preguntasUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PreguntasUsers  $preguntasUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreguntasUsers $preguntasUsers)
    {
        //
    }
}
