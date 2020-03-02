@extends('master')

@section('content')

    <h2 class="text-center">Crear Pregunta</h2>

            <form action="{{route('pregunta.store')}}" method="POST">
                @csrf
                <div class="cliente  border-secondary form-group ">
                    <div class="m-1">
                        <label for="titulo">Titulo:</label>
                        <input class="form-control" type="text" id="titulo" name="titulo" REQUIRED>
                    </div>
                    <div class="m-1">
                        <label for="descripcion">Descripcion:</label>
                        <textarea class="form-control" type="text" rows="5" id="descripcion" name="descripcion" REQUIRED></textarea>
                    </div>

                    <div class="m-1">
                        <label for="tema">Tema</label>

                        <select class="custom-select" name="tema" REQUIRED>
                            <option disabled selected value="">--</option>
                            @foreach($temas as $tema)
                                <option value="{{$tema->id}}">{{$tema->nombreTema}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-1">
                        <button class="btn btn-1  btn-primary mt-2" type="submit" value="Crear pregunta" style="">Crear pregunta</button>

                    </div>
                </div>
            </form>




















@endsection
