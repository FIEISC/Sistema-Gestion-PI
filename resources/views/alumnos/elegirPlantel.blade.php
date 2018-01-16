@extends('modulos.plantilla')

@section('title', 'Registro')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
<h1>Elegir Plantel</h1>

<p>Selecciona un plantel: </p>

{{-- Para elegir el plantel y pasar el id del plantel al registro del alumno --}}
<form method="POST" action="{{ route('registroAlumno') }}">

	{{ csrf_field() }}

{{-- 	<select name="plantel_id" onchange="this.form.submit()" class="form-control">
		@foreach ($planteles as $plantel)
		<option value="null">Elegir</option>
		<option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
		@endforeach
	</select> --}}

	<div class="input-field col s12">
		<select name="plantel_id" onchange="this.form.submit()">
			@foreach ($planteles as $plantel)
			<option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
			@endforeach
		</select>
	{{-- 	<label>Elegir plantel</label> --}}
	</div>
</form>
</div>
@endsection


































