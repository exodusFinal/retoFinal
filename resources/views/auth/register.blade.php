@extends('master')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 40px; width: 100%;">
        <div class="d-flex justify-content-center align-items-center card signup bg-light">
            <h3 class="text-center">Registrarse</h3>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre de usuario" required autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <input type="text" id="nombre" name="nombre" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" required autofocus>
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <input type="text" id="apellido" name="apellido" class="form-control @error('apellido') is-invalid @enderror" placeholder="Apellidos" required>
                    @error('apellido')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group row">


                    <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" placeholder="Descripción" required></textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>


                <div class="form-group row">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Repite contraseña" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group row mb-0">
                    <button class="btn btn-success btn-block" type="submit">Registrar usuario</button>
                </div>
                <hr>
                <div class="form-group row mb-0">
                    <a class="aButton" href="{{route('login')}}" style="width: 100%"><button class="btn btn-success btn-block" type="button">Iniciar sesión</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
