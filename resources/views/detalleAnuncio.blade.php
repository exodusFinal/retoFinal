@extends('master')

@section('content')

    <h1 class="my-4">{{$pregunta->titulo}}</h1>

    <p>{{$pregunta->descripcion}}</p>

    <p>{{$pregunta->puntuacionPregu}}</p>
    <hr>
    <form action="{{route('respuesta.añadir', $pregunta->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <label class="h2">Respuesta</label>
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

    <hr>

    @foreach($pregunta->respuesta as $resp)
        <form method="get">
            <p>{{$resp->respuesta}}</p>
            @if($resp->adjunto != null)
                <a href="{{route('archivo.descargar', $resp->id)}}">Descargame</a>
            @endif
            <hr>
        </form>

    @endforeach
@endsection