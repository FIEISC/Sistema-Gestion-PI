@extends('admin.modulos.plantilla')

@section('title', 'Lista Carreras')

@section('contenido')

<div class="row">
	<div class="col s8 offset-s2">
	<div class="card-panel green lighten-4">
		
		<h5>Lista de las carreras</h5>

	<table class="bordered highlight centered responsive-table">
		<thead>
			<tr>
				<th>Carrera</th>
				<th>Siglas</th>
				<th>Grupo</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
{{-- 
		@if ($campus->isEmpty())
			<tr>
				<td><p class="text-center text-danger">No hay campus registrados todavía</p></td>
			</tr>
		@endif --}}

			@foreach($carreras as $carrera)
			<tr>
				<td>{{ $carrera->nom_carrera }}</td>
				<td>{{ $carrera->siglas }}</td>
				<td>{{ $carrera->grupo }}</td>
				<td>
					{{-- <a href="" class="btn btn-default btn-sm">Editar <span class="glyphicon glyphicon-edit"></span></a> --}}

					<a href="{{ route('editarCarrera', $carrera->id) }}" class="waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
				</td>
			</tr>
			@endforeach			
		</tbody>
	</table>
	</div>
	</div>
</div>
@endsection








































