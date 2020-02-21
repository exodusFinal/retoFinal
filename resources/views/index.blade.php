@extends('master')

@section('content')
    <div class="col-12" > <h1>Lista de preguntas</h1></div>
    @foreach($preguntas as $pregunta)
        <div class="row">

            <div class="col-2 mt-3">
                <button type="button" class="btn btn-default">
                    <i class="fas fa-star"></i>
                </button>
                <div id="puntosAct">
                    <button type="button"  class="btn btn-primary" onclick="sumarPunto({{$pregunta->id}})">Puntos<span class="badge badge-light ml-1" id="puntosum{{$pregunta->id}}">{{$pregunta->puntuacionPregu}}</span></button>
                </div>
            </div>
            <div class="col-10">
                <div class="card mt-3 mb-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{$pregunta->titulo}}</h5>
                        <p class="card-text">{{$pregunta->descripcion}}</p>
                        <a href="#" class="card-link">Ver anuncio</a>
                        <a href="#" class="card-link">Contactar</a>
                        <button class="btn btn-success" data-toggle="modal" data-target="#contactar">Contactar</button>
                    </div>
                </div>
            </div>
        </div>


    @endforeach

    <div class="modal fade" id="contactar" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
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
    </div>

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

    </script>


@endsection
