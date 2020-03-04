@extends('master')

@section('content')
    <div class="col-12 text-center"> <h2>Mis Preguntas</h2></div>

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
                        <h5 class="card-title">{{$pregunta->titulo}}<span class="card-text text-capitalize text-secondary small ml-3">{{$pregunta->tema->nombreTema}}</span></h5>
                        <p class="card-text">{{$pregunta->descripcion}}</p>
                        <div class="row">
                            <p class="col-12 col-md-6 text-secondary"> Creador: {{$pregunta->user->nombre}}</p>
                            <p class="col-12 col-md-6 mb-sm-3 card-text text-secondary">Fecha: {{substr($pregunta->created_at,0,-8)}} / Hora: {{substr($pregunta->created_at,10,-3)}} </p>
                        </div>
                        <a href="{{route('anuncio.detalle', $pregunta)}}" class="card-link">Ver anuncio</a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    <div class="row paginacion d-flex justify-content-center">
        {{$preguntas->links()}}
    </div>
    @if(!isset($pregunta))

        <p>Todavía no has hecho ninguna pregunta! Haz tu primera</p>
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


