@extends('master')

@section('content')
    <div class="d-flex justify-content-center align-items-center"  id="login">
        <div class="d-flex justify-content-center align-items-center card login bg-light" >
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Iniciar sesión</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-10">
                        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-10">
                        <input id="password" placeholder="Contraseña" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group row mb-0 d-flex justify-content-center">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success btn-block">
                            {{ __('Login') }}
                        </button>
                        <hr>
                        <a class="a" href="{{route('register')}}"><button class="btn btn-primary btn-block" type="button">Registrarte</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
