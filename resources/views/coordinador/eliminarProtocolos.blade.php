@extends('coordinador.modulos.plantilla')

@section('title', 'Baja Protocolos')

@section('contenido')

<div class="col-md-10 col-md-offset-1">

		<a class="waves-effect waves-light btn right" href="{{ route('verProtocolosCoordinador') }}"><i class="material-icons left">arrow_back</i>Atrás</a>
<br>
<br>

	<div class="card-panel green lighten-4">

		<h2 class="center">Eliminar protocolos</h2>
		<hr>
		@if (count($protocolos) == 0)
			<h4 class="center orange-text text-darken-1"><i class="material-icons">info</i> No hay protocolos registrados todavía</h4>
			
		@else
		<table id="myTable" class="table table-responsive table-bordered table-hover">
			
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Carrera</th>
					<th>Semestre</th>
					<th>Ciclo</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($protocolos as $protocolo)
				@if ($protocolo->activo == 1)
				<tr>
					<td>{{ $protocolo->id }}</td>
					<td>{{ $protocolo->nom_protocolo }}</td>
					<td>{{ $protocolo->carrera }}</td>
					<td>{{ $protocolo->semestre }}</td>

					@if ($protocolo->ciclo->ciclo == 1)
					<td>AGO-DIC</td>
					@elseif($protocolo->ciclo->ciclo == 2)
					<td>ENE-JUL</td>
					@endif
					<td>

						<form action="{{ route('datosEliminarProtocolo', $protocolo->id) }}" method="POST">
							{!! csrf_field() !!}
							{!! method_field('DELETE') !!}

							{{-- <button type="submit" class="btn btn-danger btn-sm">Eliminar  <span class="glyphicon glyphicon-remove"></span></button> --}}

							<button class="btn waves-effect waves-light red" type="submit">Eliminar
								<i class="material-icons">close</i>
							</button>
							
						</form>
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
	
</div>
@endsection