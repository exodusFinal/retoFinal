@extends('master')

@section('content')
    <div class="  text-center"><h2 class="text-center">Perfil</h2></div>
    <div class="cliente  border-secondary form-group ">
        @if($users->id == \Illuminate\Support\Facades\Auth::id())
            <form action="{{route('perfil.update', $users->id)}}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="mt-1  text-center">
                    <label>
                        <img class="card-img-top" src="images/{{$users->foto}}" style="width: 50% " alt="Card image cap">
                        <input name="image" type="file" hidden>
                    </label>
                </div>
                <div class="mt-1 text-center">
                    <input type="submit" class="btn btn-primary" value="Cambiar">
                </div>
            </form>
        @else
            <div class="mt-1  text-center">
                <label>
                    <img class="card-img-top" src="images/{{$users->foto}}" style="width: 50% " alt="Card image cap">
                </label>
            </div>
        @endif

        <div class="row">
            <div class="m-1 col">
                <label for="titulo">Nick:</label>
                <input class="form-control" type="text" id="name" name="name" value="{{$users->name}}" disabled>
            </div>
            <div class="m-1 col">
                <label for="titulo">Puntuación:</label>
                <input class="form-control" type="text" id="puntosUsu" name="puntosUsu" value="{{$users->puntosUsu}}"
                       disabled>
            </div>

        </div>
        <div class="m-1">
            <label for="titulo">Email:</label>
            <input class="form-control" type="text" id="email" name="email" value="{{$users->email}} " disabled>
        </div>
        <div class="row">
            <div class="m-1 col">
                <label for="titulo">Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" value="{{$users->nombre}}" disabled>
            </div>
            <div class="m-1 col">
                <label for="titulo">Apellido:</label>
                <input class="form-control" type="text" id="apellido" name="apellido" value="{{$users->apellido}}"
                       disabled>
            </div>
        </div>
        <div class="m-1">
            <label for="titulo">Descripcion:</label>
            <input class="form-control" type="text" id="descripcion" name="descripcion" value="{{$users->descripcion}}"
                   disabled>
        </div>

    </div>


@endsection


