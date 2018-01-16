@extends('coordinadorCarrera.modulos.plantilla')

@section('title', 'Alta Tutor')

@section('contenido')

<div class="col-md-4 col-md-offset-4">
	<h1>Alta tutor</h1>

	<form action="{{ route('asignarAltaTutoresProyectoForm', $docente->id) }}" method="POST">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		<div class="form-group">
			<label for="t_proy">Carrera</label>
			<select name="t_proy" id="t_proy" class="form-control">
				@foreach ($carreras as $carrera)
					<option value="{{ $carrera->grupo }}">{{ $carrera->nom_carrera }}</option>
				@endforeach
			</select>
		</div>

	@php
	$roles = $docente->rol;
	$rol = explode(',', $roles);
	@endphp

	@if ($rol[0] == 1 && $rol[1] == 4)
		<input type="hidden" name="rol[]" value="1">
		<input type="hidden" name="rol[]" value="3">
		<input type="hidden" name="rol[]" value="4">
	@elseif($rol[0] == 2 && $rol[1] == 4)
	     <input type="hidden" name="rol[]" value="2">
	     <input type="hidden" name="rol[]" value="3">
	     <input type="hidden" name="rol[]" value="4">
	@elseif($rol[0] == 4)
	     <input type="hidden" name="rol[]" value="3">
	     <input type="hidden" name="rol[]" value="4">
	@endif


		<button type="submit" class="btn btn-primary btn-block">Asignar</button>
	</form>
</div>
@endsection