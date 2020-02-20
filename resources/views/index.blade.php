@extends('master')

@section('content')

    @foreach($preguntas as $pregunta)
        <div class="row">
            <div class="col-2 mt-3">
                <button type="button" class="btn btn-primary">
                    Puntos <span class="badge badge-light">{{$pregunta->puntuacionPregu}}</span>
                    <span class="sr-only">unread messages</span>
                </button>
            </div>
            <div class="col-10">
                <div class="card mt-3 mb-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{$pregunta->titulo}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">{{$pregunta->descripcion}}</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>


    @endforeach






@endsection
