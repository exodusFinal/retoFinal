
@extends('master')

@section('content')
    <h1>Perfil</h1>

    <form>
        @csrf
        <div class="cliente  border-secondary form-group ">
            <div class="m-1">
                <label for="titulo">Name:</label>
                <input class="form-control" type="text" id="name" name="name"  value="{{$users->name}}">
            </div>
            <div class="m-1">
                <label for="titulo">Email:</label>
                <input class="form-control" type="text" id="email" name="email"  value="{{$users->email}}">
            </div>
            <div class="m-1">
                <label for="titulo">Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre"  value="{{$users->nombre}}">
            </div>
            <div class="m-1">
                <label for="titulo">Apellido:</label>
                <input class="form-control" type="text" id="apellido" name="apellido"  value="{{$users->apellido}}">
            </div>
            <div class="m-1">
                <label for="titulo">Descripcion:</label>
                <input class="form-control" type="text" id="descripcion" name="descripcion"  value="{{$users->descripcion}}">
            </div>
            <div class="m-1">
                <label for="titulo">Puntos del Usuario:</label>
                <input class="form-control" type="text" id="puntosUsu" name="puntosUsu"  value="{{$users->puntosUsu}}">
            </div>
        </div>
    </form>

@endsection


