@extends('docente.modulos.plantilla')

@section('title', 'Docente')

@section('contenido')

@php
  $hoy = date('d-m-20y');
@endphp

<br>
<br>

<div class="card-panel lime lighten-3 hoverable">
  <h5 class="right-align">{{ $hoy }}  <span class="glyphicon glyphicon-calendar"></span></h5>
    
    <h4 class="center-align">Bienvenid@ ={{ Auth::user()->nom_docente }}=</h4>
    <h5 class="center-align">Ahora estas como Docente</h5>

  
</div>

@endsection