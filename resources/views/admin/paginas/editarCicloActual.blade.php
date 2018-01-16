@extends('admin.modulos.plantilla')

@section('title', 'Editar Carrera')

@section('contenido')

<div class="row">
	<div class="col-s6 offset-3">
		<div class="card-panel green lighten-4">
			
			<form action="{{ route('datosEditarCicloActual', $ciclo->id) }}" method="POST">
				
				{!! csrf_field() !!}
				{!! method_field('PUT') !!}

				<div class="row">
			<div class="input-field col s12">
				<input id="nom_ciclo" name="nom_ciclo" type="text" class="validate" value="{{ $ciclo->nom_ciclo }}">
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
			<input type="date" class="datepicker" name="fec_ini" value="{{ $ciclo->fec_ini }}">
			<div class="input-group-addon">
				<span class="glyphicon glyphicon-th"></span>
			</div>
		</div>
	</div>
		<br>
		<div class="row">
			<label for="date" class="form-control">Fecha 2</label>
		<div class="input-group">
			<input type="date" class="datepicker" name="fec_fin" value="{{ $ciclo->fec_fin }}">
			<div class="input-group-addon">
				<span class="glyphicon glyphicon-th"></span>
			</div>
		</div>
		</div>
        <br>
		<div class="form-group">
		   <button type="submit" class="btn btn-primary btn-block">Crear Ciclo</button>
		</div>

			</form>
		</div>
	</div>
</div>
@endsection








































