<?php

namespace App\Http\Controllers;

use App\Favorito;
use App\Pregunta;
use App\Tema;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        /*$preguntas = Pregunta::paginate(5);
        */
        $preguntas = Pregunta::orderBy('id','DESC')->paginate(5);

        return view('index',['preguntas' => $preguntas]);



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
    public function show($id)
    {
        $pregunta = Pregunta::find($id);
        return view('detalleAnuncio',[
            'pregunta' => $pregunta
        ]);
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

    public function orderByPuntos(){

        $preguntas = Pregunta::orderBy('puntuacionPregu', 'DESC')->get();

        return view('mejorValoradas',compact('preguntas'));
    }

    public function misPreguntas($id){

        $preguntas = Pregunta::all()->where('user_id','=',$id);

        return view('misPreguntas',compact('preguntas'));
    }

    public function favoritos($id){

       /* $favoritos = Favorito::all()->where('user_id','=',$id);*/

        $usuario = User::find($id);

        $favUsu = $usuario->favorito;

        $preguntas = DB::table('preguntas')
            ->select('preguntas.*')
            ->join('favoritos','preguntas.id','=','favoritos.pregunta_id')
            ->where('favoritos.user_id','=',$id)
            ->orderBy('preguntas.id','DESC')
            ->get();

        return view('misFavoritos',compact('preguntas'));

    }



}
