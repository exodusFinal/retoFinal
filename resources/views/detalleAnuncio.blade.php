@extends('master')

@section('content')
    <div class="row my-4">
        <div class="col-4">
            <h1>{{$pregunta->titulo}}</h1>
        </div>
        <div class=" mt-1 col-8">
            <button class="mt-1 btn btn-primary" disabled>{{$pregunta->puntuacionPregu}} puntos</button>
        </div>

    </div>


    <p>{{$pregunta->descripcion}}</p>

    <hr>
    <form action="{{route('respuesta.añadir', $pregunta->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <label class="h2">Responder</label>
        <textarea class="form-control" id="respuesta" name="respuesta" cols="100" rows="7"></textarea>
        <br>
        <!--<div class="custom-file">
            <input type="file" class="custom-file-input" name="adjunto">
            <label class="custom-file-label" for="validatedCustomFile">Elegir elemento adjunto</label>
        </div>-->
        <input type="file" class="form-control-file" name="adjunto">
        <br><br>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
    <br>
    <h2>Respuestas</h2>
    <hr>

    @foreach($pregunta->respuesta as $resp)
        <form method="get">
            <div class="row">
                <div class="col-2 mt-3">
                    <button type="button"  class="btn btn-primary" onclick="sumarPunto({{$resp->id}})">Puntos<span class="badge badge-light ml-1" id="puntosumR{{$resp->id}}">{{$resp->puntosResp}}</span></button>
                </div>
                <div class="col-10">
                            <p>{{$resp->respuesta}}</p>
                            @if($resp->adjunto != null)
                                <a href="{{route('archivo.descargar', $resp->id)}}">Descargar archivo</a>
                            @endif
                </div>
            </div>
            <hr>
        </form>

    @endforeach


    <script>
        function sumarPunto(id) {
            $.ajax({
                method: "get",
                url: '/respuesta/update',
                data:{id: id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(respuesta) {
                    $('#puntosumR'+respuesta['id']).html(respuesta['puntosResp']);

                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            });
        }
    </script>
@endsection