@extends('master')

@section('content')
    <div class="row mb-2">
        <div class="col-md-2 d-none d-md-block mt-5">
            <button class="mt-1 btn btn-primary" disabled>{{$pregunta->puntuacionPregu}} puntos</button>
        </div>
        <div class="col-12 col-md-10">
            <div class="card mt-3 mb-3">
                <div class="card-body ">
                    <div class="row">
                        <img class="rounded d-none d-md-block col-4 " src="{{ asset('images/'.$usuario->foto) }}" style="width: 15%;">
                        <div class="col-8">
                        <h2 class="text-center ">{{$pregunta->titulo}}</h2>
                        <p >{{$pregunta->descripcion}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <a class="col-3 d-none d-md-block" href="{{route('perfil.usuario', $usuario->id)}}"><p>{{$usuario->nombre}} {{$usuario->apellido}}</p></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

        <div class="col offset-10">

        </div>



    <hr>
    <form action="{{route('respuesta.añadir', $pregunta->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <label class="h2">Responder</label>
        <textarea class="form-control" id="respuesta" name="respuesta" cols="100" rows="7" required></textarea>
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
    <h3 class="text-center">Respuestas</h3>
    <hr>

    @foreach($pregunta->respuesta as $resp)
        <form method="get">
            <div class="row">

                <div class="col mt-3">
                    <button type="button" class="btn btn-primary" onclick="sumarPunto({{$resp->id}})">Puntos<span
                                class="badge badge-light ml-1" id="puntosumR{{$resp->id}}">{{$resp->puntosResp}}</span>
                    </button>
                </div>
                <div class="col">
                    <p>{{$resp->respuesta}}</p>
                    @if($resp->adjunto != null)
                        <a href="{{route('archivo.descargar', $resp->id)}}">Descargar archivo</a>
                    @endif
                </div>
                <div class="col-2">
                    <a class=" d-none d-md-block" href="{{route('perfil.usuario', $resp->user->id)}}"><p>{{$resp->user->nombre}} {{$resp->user->apellido}}</p></a>
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
                data: {id: id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (respuesta) {
                    $('#puntosumR' + respuesta['id']).html(respuesta['puntosResp']);

                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            });
        }
    </script>
@endsection