@extends('admin.modulos.plantilla')

@section('title', 'Dar de alta Campus')

@section('contenido')

<div class="row">
	<div class="col s6 offset-s3">

	<div class="card-panel green lighten-4">

		<h5>Dar de alta a Campus</h5>

		<form action="{{ route('altaCampusForm') }}" method="POST">

			{!! csrf_field() !!}

			<div class="input-field col s12">
				<input id="nom_campus" name="nom_campus" type="text" class="validate">
				<label for="nom_campus">Nombre del Campus</label>
			</div>

			<div class="input-field col s12">
				<input id="delegacion" name="delegacion" type="text" class="validate">
				<label for="delegacion">Delegación</label>
			</div>

			<div class="input-field col s12">
				<input id="nom_universidad" name="nom_universidad" type="text" class="validate" value="Universidad de Colima" readonly="true">
				<label for="nom_universidad">Universidad</label>
			</div>

			{{-- <button type="submit" class="btn btn-primary">Registrar</button> --}}

			<button class="btn waves-effect waves-light" type="submit">Registrar
				<i class="material-icons right">send</i>
			</button>
		</form>
		<br>
		<a href="{{ route('listaCampus') }}">Ver lista de Campus</a>
	</div>
	</div>
</div>
@endsection








































