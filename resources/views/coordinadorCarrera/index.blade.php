@extends('coordinadorCarrera.modulos.plantilla')

@section('title', 'Coordinador Carrera')

@section('contenido')

@php
  $hoy = date('d-m-20y');
@endphp

<div class="card-panel lime lighten-3 hoverable">
<h5 class="right-align">{{ $hoy }}  <span class="glyphicon glyphicon-calendar"></span></h5>
	<h4>Bienvenid@ ={{ Auth::user()->nom_docente }}=</h4>

@if (Auth::user()->c_carr == 'A')
	<h5>Eres coordinador de la carrera 'Mecánico Electricista'</h5>

@elseif(Auth::user()->c_carr == 'B')
    <h5>Eres coordinador de la carrera 'Tecnologías Electrónicas'</h5>

@elseif(Auth::user()->c_carr == 'C')
    <h5>Eres coordinador de la carrera 'Mecatrónica'</h5>

@elseif(Auth::user()->c_carr == 'D')
    <h5>Eres coordinador de la carrera 'Sistemas Computacionales'</h5>
@endif
</div>

<br>
<br>
@endsection