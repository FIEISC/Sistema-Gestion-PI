@extends('admin.modulos.plantilla')

@section('title', 'Editar Carrera')

@section('contenido')

<div class="row">
	<div class="col-s6 offset-3">
		<div class="card-panel green lighten-4">
			
			<form action="{{ route('datosEditarCarrera', $carrera->id) }}" method="POST">
				
				{!! csrf_field() !!}
				{!! method_field('PUT') !!}

				<div class="row">
					<div class="input-field col s12">
						<input id="nom_carrera" type="text" name="nom_carrera" value="{{ $carrera->nom_carrera }}">
						<label for="nom_carrera">Nombre de la Carrera</label>
					</div>
				</div>


				<div class="row">
					<div class="input-field col s12">
						<input id="siglas" type="text" name="siglas" value="{{ $carrera->siglas }}">
						<label for="siglas">Siglas</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="grupo" type="text" name="grupo" value="{{ $carrera->grupo }}">
						<label for="grupo">Siglas</label>
					</div>
				</div>

				<button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>

			</form>
		</div>
	</div>
</div>
@endsection








































