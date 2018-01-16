@extends('modulos.plantilla')

@section('title', 'N5')

@section('contenido')

<div style="margin-top: 30px;" class="btn-group btn-group-justified" role="group" aria-label="...">
  
  <div class="btn-group" role="group">
    <a href="{{ route('docente') }}" class="btn btn-default">Docente</a>
  </div>

   <a href="{{ route('salir') }}" class="btn btn-default">Salir   <span class="glyphicon glyphicon-log-out"></span></a>
</div>

@php
  $hoy = date('d-m-20y');
@endphp

<br>
<br>

<div class="card-panel lime lighten-3 hoverable">
  <h5 class="right-align">{{ $hoy }}  <i class="material-icons" style="font-size: 50x;">event</i></h5>
     <h4 class="center-align">¡Buen día!</h4>

    <h4 class="center-align">Bienvenid@ ={{ Auth::user()->nom_docente }}=</h4>
    <h5 class="center-align">Ahora estas logueado</h5>

  
</div>
@endsection