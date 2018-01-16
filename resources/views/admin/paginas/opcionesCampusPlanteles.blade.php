@extends('admin.modulos.plantilla')

@section('title', 'Lista Campus')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<h1>Elegir Campus</h1>

<form action="{{ route('datoElegirCampusPlanteles') }}" method="POST">
	{{ csrf_field() }}

	<div class="input-field col s12">
		<select name="campus_id" onchange="this.form.submit()">
			@foreach ($campus as $campu)
			<option value="{{ $campu->id }}">{{ $campu->nom_campus }}</option>
			@endforeach
		</select>
	</div>
</form>
	
</div>

@endsection