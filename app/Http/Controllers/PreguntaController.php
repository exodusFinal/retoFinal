<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $preguntas = Pregunta::all();
        return view('index',compact('preguntas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $temas = Tema::all();
        return view('registroPregunta',compact('temas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $preguntas = new Pregunta();

        $preguntas->titulo = request("titulo");
        $preguntas->descripcion = request("descripcion");
        $preguntas->puntuacionPregu = 0;
        $preguntas->user_id = Auth::id();
        $preguntas->tema_id = request("tema");

        $preguntas->save();

        return redirect()->route('index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $pregunta = Pregunta::find(request('id'));
        $puntos = $pregunta->puntuacionPregu +1;
        $pregunta->puntuacionPregu = $puntos;

        $pregunta->save();

        return $pregunta;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
