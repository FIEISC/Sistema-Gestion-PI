@extends('admin.modulos.plantilla')

@section('title', 'Ciclos')

@section('contenido')

<div class="row">
	<div class="col s8 offset-s2">
	<div class="card-panel green lighten-4">
		<h4 class="center">Crear Ciclo</h4>

	   @if (count($ciclo_actual) == 1)
	   	<p>Aun esta activo el ciclo actual, debes dar de baja el ciclo para poder crear uno nuevo</p>

	   	@else
	   	<form action="{{ route('altaCiclosForm') }}" method="POST">
		{!! csrf_field() !!}

		<div class="row">
			<div class="input-field col s12">
				<input id="nom_ciclo" name="nom_ciclo" type="text" class="validate">
				<label for="nom_ciclo">Nombre del Ciclo Escolar</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<select name="ciclo">
					<option value="" disabled selected>Elige el ciclo escolar</option>
					<option value="1">AGOSTO-DICIEMBRE</option>
					<option value="2">ENERO-JUNIO</option>
				</select>
				<label>Ciclo Escolar</label>
			</div>
		</div>

	<div class="row">
			<label for="date" class="form-control">Fecha</label>
		<div class="input-group">
			<input type="date" class="datepicker" name="fec_ini" value="{!!date('20y-m-d') !!}">
			<div class="input-group-addon">
				<span class="glyphicon glyphicon-th"></span>
			</div>
		</div>
	</div>
		<br>
		<div class="row">
			<label for="date" class="form-control">Fecha 2</label>
		<div class="input-group">
			<input type="date" class="datepicker" name="fec_fin">
			<div class="input-group-addon">
				<span class="glyphicon glyphicon-th"></span>
			</div>
		</div>
		</div>
        <br>
		<div class="form-group">
		   <button type="submit" class="btn btn-primary btn-block">Crear Ciclo</button>
		</div>
	   @endif

		<a href="{{ route('listaCiclos') }}"><p>Ver ciclo actual</p></a>
	</form>
	</div>
	</div>
</div>

@endsection








































