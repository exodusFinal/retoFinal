<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plane Overflow</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-2" href="#"><img src="{{asset('img/logo.png')}}" height="42" width="42"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active ml-4">
                <a class="nav-link" href="#">Inicio </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Crear pregunta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Perfil</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="nav-link" href="#">Log Out</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-2 ml-3 mr-3">
            <ul class="list-group">
                <li class="list-group-item active">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-9 border">
            @yield('content')
            {{--
                            <p>asfjkfkfdaskjfdsjkkfdlskjldfskljdfskljdkfjlskjdfsakjlfdsakldfsakljklflkljdfsjkldfskljfdsal</p>
            --}}
        </div>
    </div>
</div>


</nav>
</body>
</html>