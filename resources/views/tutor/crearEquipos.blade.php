@extends('tutor.modulos.plantilla')

@section('title', 'Crear Equipos')

@section('contenido')

<div class="row">
	<div class="col s10 offset-s1">

		<div class="card-panel green lighten-4">
			<h5 class="center-align">Crear Equipos</h5>
			<p class="text-info">Da click sobre el equipo creado para asignarle a los alumnos</p>

			@if (count($protocolos) === 0)
				<h5 class="center-align blue-text">No hay protocolos creados todavía</h5>

		    @else
		    <table class="bordered highlight centered responsive-table">
		<thead>
			<tr>
				<th>Protocolo</th>
				<th>Equipos</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($protocolos as $protocolo)
				<tr>
					<td>{{ $protocolo->nom_protocolo }}</td>
					<td>
						@foreach ($protocolo->equipos as $equipo)
						<ul>
							<li style="list-style: none;"><a href="{{ route('asignarAlumnosEquipos', $equipo->id) }}">{{ $equipo->nom_equipo }}</a></li>
						</ul>
						@endforeach
					</td>

					<td>
						{{-- <a href="{{ route('crearEquiposForm', $protocolo->id) }}" class="btn btn-primary btn-sm">Crear</a> --}}

						<a href="{{ route('crearEquiposForm', $protocolo->id) }}" class="waves-effect waves-light green btn tooltipped pulse" data-position="top" data-delay="50" data-tooltip="Crear Equipo"><i class="material-icons">create</i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
			@endif
		</div>
	</div>
</div>
@endsection

