<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exodus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1de908b2dd.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{asset('img/logo_ico.ico')}}" type="image/x-icon" sizes="16x16">
</head>
<body>
@if(Auth::check())
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-2" href="{{route('index')}}"><img src="{{asset('img/logo.png')}}" height="42" width="42"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active ml-4">
                    <a class="nav-link" href="/index">Inicio </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/create/pregunta">Crear pregunta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/perfil">Perfil</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav-link">{{Auth::user()->name}}</a></li>
                <li><a class="nav-link" href="{{route('cerrarSesion')}}">Log Out</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="btn-group mb-3 col-12 d-md-none" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-secondary"><a class="nav-item" href="/pregunta/misPreguntas/{{Auth::id()}}">Mis Preguntas</a></button>
                <button type="button" class="btn btn-secondary"><a class="nav-item" href="/pregunta/favoritos/{{Auth::id()}}">Favoritos</a>
                </button>
                <button type="button" class="btn btn-secondary"><a class="nav-item" href="/pregunta/puntos">Mejor valoradas</a>
                </button>

                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">Igual no se usa</a>
                        <a class="dropdown-item" href="#">Pero se queda</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 d-none d-md-block ml-3 mr-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="nav-item" href="/pregunta/misPreguntas/{{Auth::id()}}">Mis Preguntas</a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-item" href="/pregunta/favoritos/{{Auth::id()}}">Favoritos</a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-item" href="/pregunta/puntos">Mejor valoradas</a>
                    </li>

                </ul>
            </div>
            <div class="col-12 col-md-9">
                @yield('content')

            </div>
        </div>
    </div>
@else
    <div class="container-fluid">
        @yield('content')
    </div>
@endif
</body>
</html>