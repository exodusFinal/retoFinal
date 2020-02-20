@extends('master')

@section('content')



    <h1>Crear Pregunta</h1>



            <form action="/pregunta/store" method="POST">
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
                       {{-- <select class="custom-select" name="tema"  REQUIRED>
                            <option value="1">Vehículos ligeros</option>
                            <option value="2">Vehículos pesados </option>
                            <option value="3">Vehículos especiales y agrícolas</option>
                            <option value="4">Otros vehículos</option>
                        </select>--}}
                        <select class="custom-select" name="tema">
                            <option value="">--</option>
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


<?php
/**
 * Created by PhpStorm.
 * User: msimm
 * Date: 19/02/2020
 * Time: 12:29
 */
?>