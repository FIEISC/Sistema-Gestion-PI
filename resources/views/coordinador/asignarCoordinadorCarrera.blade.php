@extends('coordinador.modulos.plantilla')

@section('title', 'Válidar y Asignar Usuarios')

@section('contenido')

@if (Session::has('info'))
	<div class="alert alert-warning">
		{{ Session::get('info') }}
	</div>
@endif

<div class="row">
	<div class="col s6 offset-s3">
	<div class="card-panel green lighten-4 hoverable">
		<h5>Dar alta a coordinador de carrera</h5>

		<p><b>Docente:</b> {{ $docente->nom_docente }}</p>

	<form action="{{ route('formAsignarCoordinadorCarrera', $docente->id) }}" method="POST">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

    <p>
      <input name="c_carr" type="radio" id="A" value="A" />
      <label for="A">Ingeniero Mecánico Electricista</label>
    </p>

    <p>
      <input name="c_carr" type="radio" id="B" value="B" />
      <label for="B">Ingeniería en Tecnologías Electrónicas</label>
    </p>

    <p>
    	<input name="c_carr" type="radio" id="C" value="C" />
    	<label for="C">Ingeniero en Mecatrónica</label>
    </p>


    <p>
    	<input name="c_carr" type="radio" id="D" value="D" />
    	<label for="D">Ingeniería en Sistemas Computacionales</label>
    </p>


    <input type="hidden" name="rol[]" value="2">
    <input type="hidden" name="rol[]" value="4">


    <button class="btn waves-effect waves-light" type="submit">Dar de alta
    	<i class="material-icons right">send</i>
    </button>
		
	</form>
	</div>
	</div>
</div>

@endsection