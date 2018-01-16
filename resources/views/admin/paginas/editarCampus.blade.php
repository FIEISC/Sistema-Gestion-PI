@extends('admin.modulos.plantilla')

@section('title', 'Editar Campus')

@section('contenido')

<div class="row">
	<div class="col-s6 offset-3">
		<div class="card-panel green lighten-4">
			
			<form action="{{ route('datosEditarCampus', $campus->id) }}" method="POST">
				
				{!! csrf_field() !!}
				{!! method_field('PUT') !!}

				<div class="row">
					<div class="input-field col s12">
						<input id="nom_campus" type="text" name="nom_campus" value="{{ $campus->nom_campus }}">
						<label for="nom_campus">Nombre del Campus</label>
					</div>
				</div>


				<div class="row">
					<div class="input-field col s12">
						<input id="delegacion" type="text" name="delegacion" value="{{ $campus->delegacion }}">
						<label for="delegacion">Delegación</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="nom_universidad" type="text" name="nom_universidad" value="{{ $campus->nom_universidad }}">
						<label for="nom_universidad">Nombre de la Universidad</label>
					</div>	
				</div>

				<button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>

			</form>
		</div>
	</div>
</div>
@endsection








































