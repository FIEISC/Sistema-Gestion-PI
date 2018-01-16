@extends('coordinador.modulos.plantilla')

@section('title', 'Coordinador Académico')

@section('contenido')

@php
  $hoy = date('d-m-20y');
@endphp

<div class="row">
	<div class="col s10 offset-s1">
		<div class="card-panel lime lighten-3 hoverable">

		<h5 class="right-align">{{ $hoy }}  <i class="material-icons" style="font-size: 50x;">event</i></h5>
			<h4  class="center-align">Bienvenid@ ={{ Auth::user()->nom_docente }}=</h4>
			<h5  class="center-align">Ahora estas como Coordinador Académico</h5>
		</div>
	</div>
</div>


@endsection