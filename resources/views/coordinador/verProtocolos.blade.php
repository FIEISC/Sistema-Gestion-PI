@extends('coordinador.modulos.plantilla')

@section('title', 'Protocolos')

@section('contenido')


<div class="col-md-12 col-md-offset-0">

<div class="row">
	<div class="col offset-s7">
		<a href="{{ route('bajaProtocolosCoordinador') }}" class="waves-effect waves-light orange btn"><i class="material-icons">arrow_downward</i>Baja</a>

<a href="{{ route('eliminarProtocolos') }}" class="waves-effect waves-light red btn"><i class="material-icons">close</i>Eliminar</a>
	</div>
</div>

	<h4 class="center-align">Todos los Protocolos</h4>

	@if (count($protocolos) == 0)
		<h4 class="center orange-text text-darken-1"><i class="material-icons">info</i> No hay protocolos registrados todavía</h4>

	@else
	<table id="myTable" class="table table-responsive table-bordered table-hover">
		
		<thead>
			<tr>
			    {{-- <th>ID</th> --}}
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
					{{-- <td>{{ $protocolo->id }}</td> --}}
					<td>{{ $protocolo->nom_protocolo }}</td>
					<td>{{ $protocolo->carrera }}</td>
					<td>{{ $protocolo->semestre }}</td>

					@if ($protocolo->ciclo->ciclo == 1)
						<td>AGO-DIC</td>
					@elseif($protocolo->ciclo->ciclo == 2)
					     <td>ENE-JUL</td>
					@endif
					<td>
						
						<a href="{{ route('verProtocoloCoordinador', $protocolo->id) }}" style="margin-left: 50px;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ventana">Ver  <span class="glyphicon glyphicon-eye-open"></span></a>

					</td>
				</tr>
			@endif
			@endforeach
		</tbody>
	</table>
	@endif
</div>

@endsection