@extends('master')

@section('content')
    <div class="col-12 text-center"> <h2>Mejor Valoradas</h2></div>
    @if(isset($preguntas))
    @foreach($preguntas as $pregunta)
        <div class="row">
            <div class="col-3 mt-3">
                @if(\App\Favorito::where('pregunta_id', $pregunta->id)->where('user_id', \Illuminate\Support\Facades\Auth::id())->value('pregunta_id') == $pregunta->id)
                    <button type="button" class="btn btn-default"  onclick="anadirFav({{$pregunta->id}})"><i id="estrella{{$pregunta->id}}" class="star2"  id="fav{{$pregunta->id}}"></i></button>
                @else
                    <button type="button" class="btn btn-default"  onclick="anadirFav({{$pregunta->id}})"><i id="estrella{{$pregunta->id}}" class="star"  id="fav{{$pregunta->id}}"></i></button>
                @endif
                    <button type="button"  class="btn btn-primary" onclick="sumarPunto({{$pregunta->id}})">Puntos<span class="badge badge-light ml-1" id="puntosum{{$pregunta->id}}">{{$pregunta->puntuacionPregu}}</span></button>
            </div>
            <div class="col-9">
                <div class="card mt-3 mb-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{$pregunta->titulo}} <span class="card-text text-capitalize text-secondary small ml-3">{{$pregunta->tema->nombreTema}}</span></h5>
                        <p class="card-text">{{$pregunta->descripcion}}</p>
                        <div class="row">
                            <p class="col-12 col-md-6 text-secondary"> Creador: {{$pregunta->user->nombre}}</p>
                            <p class="col-12 col-md-6 mb-sm-3 card-text text-secondary">Fecha: {{substr($pregunta->created_at,0,-8)}} / Hora: {{substr($pregunta->created_at,10,-3)}} </p>
                        </div>
                        <a href="{{route('anuncio.detalle', $pregunta)}}" class="card-link">Ver anuncio</a>
                        <a href="" class="card-link" data-toggle="modal" data-target="#contactar{{$pregunta->id}}">Contactar</a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="contactar{{$pregunta->id}}" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactarLabel">Contactar con compañero</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea placeholder="Mensaje" id="mensaje" name="mensaje" style="width: 100%"></textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="contactarAnunciante({{$pregunta->user_id}})">Enviar</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row paginacion d-flex justify-content-center">
        {{$preguntas->links()}}
    </div>
    @endif
    <script>
        function sumarPunto(id) {
            $.ajax({
                method: "get",
                url: '/pregunta/update',
                data:{id: id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(pregunta) {
                    $('#puntosum'+pregunta['id']).html(pregunta['puntuacionPregu']);

                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            });
        }

        function contactarAnunciante(id) {
            $.ajax({
                method: 'get',
                url: "/contactarAnunciante/"+id,
                data: {idUsu: id, mensaje: $('#mensaje').val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    alert('Le has enviado un correo a '+data)
                    $('#mensaje').val("")
                    $('body').removeClass('modal-open');
                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            });
        }

        function anadirFav(id) {
            $.ajax({
                method: "get",
                url: '/favorito',
                data:{id: id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(texto) {
                    alert (texto);
                    if(texto == "Se ha añadido a favoritos"){
                        $("#estrella"+id).removeClass('star');
                        $("#estrella"+id).addClass('star2')
                    }else{
                        $("#estrella"+id).removeClass('star2');
                        $("#estrella"+id).addClass('star')
                    }
                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            })
        }

    </script>







@endsection









<?php
/**
 * Created by PhpStorm.
 * User: msimm
 * Date: 25/02/2020
 * Time: 17:42
 */
?>
