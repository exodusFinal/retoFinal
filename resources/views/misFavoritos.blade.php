@extends('master')

@section('content')
    <div class="col-12 text-center"><h2>Mis Favoritos</h2></div>
    @foreach($preguntas as $pregunta)
        <div class="row" id="pregunta{{$pregunta->id}}">
            <div class="col-3 mt-3">
                @if(\App\Favorito::where('pregunta_id', $pregunta->id)->where('user_id', \Illuminate\Support\Facades\Auth::id())->value('pregunta_id') == $pregunta->id)
                    <button type="button" class="btn btn-default"  onclick="anadirFav({{$pregunta->id}})"><i id="estrella{{$pregunta->id}}" class="star2"  id="fav{{$pregunta->id}}"></i></button>
                @else
                    <button type="button" class="btn btn-default"  onclick="anadirFav({{$pregunta->id}})"><i id="estrella{{$pregunta->id}}" class="star"  id="fav{{$pregunta->id}}"></i></button>
                @endif
                <button type="button" class="btn btn-primary" onclick="sumarPunto({{$pregunta->id}})">Puntos<span
                            class="badge badge-light ml-1"
                            id="puntosum{{$pregunta->id}}">{{$pregunta->puntuacionPregu}}</span></button>
            </div>
            <div class="col-9">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{$pregunta->titulo}}<span class="card-text text-capitalize text-secondary small ml-3">{{$pregunta->nombreTema}}</span></h5>
                        <p class="card-text">{{$pregunta->descripcion}}</p>
                        <div class="row">
                            <p class="col text-secondary"></p>
                            <p class="col card-text text-secondary">Fecha: {{substr($pregunta->created_at,0,-8)}} / Hora: {{substr($pregunta->created_at,10,-3)}} </p>
                        </div>
                        <a href="{{route('anuncio.detalle', $pregunta->id)}}" class="card-link">Ver pregunta</a>{{-- De $pregunta a $pregunta->id --}}
                        <a href="" class="card-link" data-toggle="modal" data-target="#contactar">Contactar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row paginacion d-flex justify-content-center">
        {{$preguntas->links()}}
    </div>
    @if(isset($pregunta))
        <div class="modal fade" id="contactar" tabindex="-1" role="dialog" aria-labelledby="contactar"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactarLabel">Contactar con el Anunciante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea placeholder="Mensaje" id="mensaje" name="mensaje" style="width: 100%"></textarea>
                        <input type="hidden" id="idUsu" value="{{$pregunta->user_id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="contactarAnunciante()">Enviar</button>

                    </div>
                </div>
            </div>
            @else
                <p>No tiene ninguna pregunta favorita todavía</p>
            @endif

        </div>

        <script>
            function sumarPunto(id) {
                $.ajax({
                    method: "get",
                    url: '/pregunta/update',
                    data: {id: id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (pregunta) {
                        $('#puntosum' + pregunta['id']).html(pregunta['puntuacionPregu']);

                    },
                    error: function (data) {
                        console.log("Error");
                        console.log(data);
                    }
                });
            }

            function contactarAnunciante() {
                $.ajax({
                    method: 'get',
                    url: "/contactarAnunciante",
                    data: {idUsu: $('#idUsu').val(), mensaje: $('#mensaje').val()},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:
                        function (data) {
                            alert(data)
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
                    data: {id: id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (texto) {
                        if (texto == 'Se ha eliminado con exito') {
                            $('#pregunta' + id).empty();
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





