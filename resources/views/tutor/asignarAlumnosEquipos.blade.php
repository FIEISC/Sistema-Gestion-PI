@extends('tutor.modulos.plantilla')

@section('title', 'Crear Equipos')

@section('contenido')

{{-- <p>Quien creo el equipo: {{ $equipo->protocolo->user_id }}</p> --}}
<div class="row">
	
	<div class="col s6 offset-s3">

			<a class="waves-effect waves-light btn right" href="{{ route('crearEquipos') }}"><i class="material-icons left">arrow_back</i>Atrás</a>
<br>
<br>
      
      <div class="card-panel green lighten-4">
      	<h5>Asignar Alumnos</h5>

{{-- <p>Equipo: {{ $equipo->nom_equipo }}  id: {{ $equipo->id }}</p> --}}
<p>Tutor del equipo: {{ $equipo->user->nom_docente }}</p>
<br>
<form action="{{ route('datosAsignarAlumnosEquipos') }}" method="POST">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}

	<div class="input-field col s12">
		<select name="alumno_id">
			<option value="" disabled selected>Elegir alumno</option>
			@foreach ($alumnos as $alumno)
			@if ($alumno->semestre == Auth::user()->t_semestre && $alumno->carrera->grupo == Auth::user()->t_proy && $alumno->equipo_id == null)
			<option value="{{ $alumno->id }}">{{ $alumno->nom_alumno }}</option>
			@endif	
            @endforeach
		</select>
		<label>Nombre del alumno</label>
	</div>

	<input type="hidden" name="equipo_id" value="{{ $equipo->id }}">

	<button type="submit" class="btn btn-primary btn-block">Asignar</button>
</form>
      </div>
	</div>
	
</div>
@endsection

