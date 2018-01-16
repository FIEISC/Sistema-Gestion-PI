@extends('admin.modulos.plantilla')

@section('title', 'Lista Planteles')

@section('contenido')

<div class="col-md-10 col-md-offset-1">

<h1>Lista de planteles</h1>
	
	@if (count($planteles) == 0)
		<h4 class="orange-text text-darken-1"><i class="material-icons">info</i>No hay planteles registrados todavía</h4>

	@else
	<table class="bordered highlight centered responsive-table">
		<thead>
			<tr>
				<th>Plantel</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($planteles as $plantel)
				<tr>
					<td>{{ $plantel->nom_plantel }}</td>
					<td><a href="{{ route('modificarDatosPlantel', $plantel->id) }}" class="waves-effect orange btn">Editar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>

@endsection