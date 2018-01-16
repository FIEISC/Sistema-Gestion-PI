@extends('tutor.modulos.plantilla')

@section('title', 'Crear Equipo')

@section('contenido')

<div class="row">
	<div class="col s6 offset-s3">

					<a class="waves-effect waves-light btn right" href="{{ route('crearEquipos') }}"><i class="material-icons left">arrow_back</i>Atrás</a>
<br>
<br>
		<div class="card-panel green lighten-4">
		<h5>Crear Equipo: </h5>
		<p>{{ $protocolo->nom_protocolo }}</p>

			<form action="{{ route('datosCrearEquipos') }}" method="POST">
				{!! csrf_field() !!}

		<div class="input-field col s12">
			<input id="nom_equipo" name="nom_equipo" type="text" class="validate">
			<label for="nom_equipo">Nombre del equipo</label>
		</div>

		<input type="hidden" name="protocolo_id" value="{{ $protocolo->id }}">


		<div class="input-field col s12">
			<select name="user_id">
				<option value="" disabled selected>Elegir docente</option>
				@foreach ($protocolo->manyUsers as $tutor)
				<option value="{{ $tutor->id }}">{{ $tutor->nom_docente }}</option>
				@endforeach
			</select>
			<label>Elige un docente</label>
		</div>

		<button class="btn waves-effect waves-light" type="submit">Crear
			<i class="material-icons right">send</i>
		</button>
	</form>
</div>
</div>
</div>
@endsection

