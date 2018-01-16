@extends('admin.modulos.plantilla')

@section('title', 'Dar de alta Planteles')

@section('contenido')

@if (Session::has('info'))
	<div class="alert alert-success">
		{{ Session::get('info') }}
	</div>
@endif

<div class="row">
	<div class="col s6 offset-s3">
	<div class="card-panel green lighten-4">
		<h5>Alta de planteles</h5>

	<form action="{{ route('altaPlantelesForm') }}" method="POST">

		{!! csrf_field() !!}

		<div class="input-field col s12">
			<input id="nom_plantel" name="nom_plantel" type="text" class="validate">
			<label for="nom_plantel">Nombre del plantel</label>
		</div>

		<div class="input-field col s12">
			<input id="siglas" name="siglas" type="text" class="validate">
			<label for="siglas">Siglas</label>
		</div>

		<div class="input-field col s12">
			<select name="campus_id">
			   @foreach ($campus as $campu)
					<option value="{{ $campu->id }}">{{ $campu->nom_campus }}</option>
				@endforeach
			</select>
			<label>Elegir campus</label>
		</div>

		<button class="btn waves-effect waves-light" type="submit">Registrar
			<i class="material-icons right">send</i>
		</button>

			<a href="{{ route('elegirCampusPlanteles') }}"><p>Ver planteles</p></a>
	</div>
	</form>
	</div>
</div>

@endsection








































