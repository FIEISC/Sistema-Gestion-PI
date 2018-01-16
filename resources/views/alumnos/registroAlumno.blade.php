@extends('modulos.plantilla')

@section('title', 'Registro')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
<h4>Registro de Alumno</h4>

{{-- <p>Elegiste: {{ $plantel->nom_plantel }}</p>

<p>Id: {{ $plantel->id }}</p> --}}

<form action="{{ route('datosRegistroAlumno') }}" method="POST">
	{!! csrf_field() !!}

	<div class="form-group">
		<label for="nom_alumno">Nombre Completo</label>
		<input type="text" name="nom_alumno" class="form-control">
	</div>

	<div class="form-group">
		<label for="email">Correo Universitario</label>
		<input type="text" name="email" class="form-control">
	</div>

	<div class="form-group">
		@if ($ciclo->ciclo == 1)
		{{-- 	<label for="semestre">Semestre</label>
			<select name="semestre" id="semestre" class="form-control">
				<option value="1">1</option>
				<option value="3">3</option>
				<option value="5">5</option>
			</select> --}}

			<div class="input-field col s12">
				<select name="semestre">
					<option value="" disabled selected>Elegir semestre</option>
					<option value="1">1</option>
		            <option value="3">3</option>
		            <option value="5">5</option>
				</select>
				<label>Elegir semestre</label>
			</div>

		@elseif($ciclo->ciclo == 2)
		{{-- <label for="semestre">Semestre</label>
			<select name="semestre" id="semestre" class="form-control">
			    <option value="null">Elegir</option>
				<option value="2">2</option>
				<option value="4">4</option>
				<option value="6">6</option>
			</select> --}}

			<div class="input-field col s12">
				<select name="semestre">
					<option value="" disabled selected>Elegir semestre</option>
					<option value="2">2</option>
				    <option value="4">4</option>
				    <option value="6">6</option>
				</select>
				<label>Elegir semestre</label>
			</div>
		@endif
	</div>

   {{--  <div class="form-group">
    	<label for="carrera">Carreras</label>
    	<select name="carrera_id" id="carrera" class="form-control">
    		@foreach ($carreras as $carrera)
    			<option value="{{ $carrera->id }}">{{ $carrera->nom_carrera }}</option>
    		@endforeach
    	</select>
    </div> --}}

      <div class="input-field col s12">
    <select name="carrera_id">
      @foreach ($carreras as $carrera)
    			<option value="{{ $carrera->id }}">{{ $carrera->nom_carrera }}</option>
    		@endforeach
    </select>
    <label>Materialize Select</label>
  </div>

    <input type="hidden" name="plantel_id" value="{{ $plantel->id }}">

    <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
</form>
</div>
@endsection