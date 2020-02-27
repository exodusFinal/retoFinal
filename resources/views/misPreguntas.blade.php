@extends('master')

@section('content')
    <div class="col-12"> <h1>Mis Preguntas</h1></div>

    @foreach($preguntas as $pregunta)

        <div class="row">
            <div class="col-2 mt-3">
                <button type="button" class="btn btn-default" onclick="anadirFav({{$pregunta->id}},{{$pregunta->user_id}})"><i class="fas fa-star"  id="fav{{$pregunta->id}}"></i></button>
                <button type="button"  class="btn btn-primary" onclick="sumarPunto({{$pregunta->id}})">Puntos<span class="badge badge-light ml-1" id="puntosum{{$pregunta->id}}">{{$pregunta->puntuacionPregu}}</span></button>
            </div>
            <div class="col-10">
                <div class="card mt-3 mb-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{$pregunta->titulo}}</h5>
                        <p class="card-text">{{$pregunta->descripcion}}</p>
                        <a href="{{route('anuncio.detalle', $pregunta)}}" class="card-link">Ver anuncio</a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
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
                data:{id: id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(texto) {
                    alert (texto);
                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            })
        }

    </script>







@endsection


