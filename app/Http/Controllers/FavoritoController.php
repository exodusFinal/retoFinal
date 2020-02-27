<?php

namespace App\Http\Controllers;

use App\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use  App\Pregunta;


class FavoritoController extends Controller
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
        //
        $existeFavorito = Favorito::where('user_id', request('usu'))->where('pregunta_id', request('id'))->get()->first();

        if ($existeFavorito == null || $existeFavorito.count() == 0){
            $favorito = new Favorito();

            $favorito->user_id = request('usu');
            $favorito->pregunta_id = request('id');

            $favorito->save();

        }else{
            Favorito::destroy($existeFavorito->id);
        }



        return redirect()->route('index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorito $favorito)
    {
        //
    }
}
