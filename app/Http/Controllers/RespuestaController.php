<?php

namespace App\Http\Controllers;

use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RespuestaController extends Controller
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
    public function store(Request $request, $id)
    {
        $respuesta = new Respuesta();

        $respuesta->respuesta = request('respuesta');
        $respuesta->puntosResp = 0;
        $respuesta->pregunta_id = $id;
        $respuesta->user_id = Auth::id();

        if ($request->hasFile('adjunto') && $request->file('adjunto')->isValid()) {
            $adj = $request->file('adjunto');
            $input['attachFileName'] = 'adjunto' . time() . '.' . $adj->getClientOriginalExtension();
            $destinationPath = public_path('/adjuntos');
            $adj->move($destinationPath, $input['attachFileName']);
            $respuesta->adjunto = $input['attachFileName'];
        }

        $respuesta->save();

        return redirect()->route('anuncio.detalle', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respuesta = Respuesta::find($id);


        //Storage::download('public/adjuntos/'.$respuesta->adjunto);
        //return redirect('anuncio.detalle', $respuesta->pregunta_id);
        return  response()->download(public_path('adjuntos/'.$respuesta->adjunto));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuesta $respuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respuesta $respuesta)
    {
        //
    }
}
