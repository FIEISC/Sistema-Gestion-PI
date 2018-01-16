@extends('coordinador.modulos.plantilla')

@section('title', 'Válidar y Asignar Usuarios')

@section('contenido')

<div class="row">
	<div class="col s12">

		<div class="card-panel green lighten-4">

			<h5 class="center-align">Válidar y dar de alta a coordinadores de carrera y docentes</h5>

			<div class="row">
				<div class="col s1 offset-s11">

					<a href="{{ route('darBajaReasignarCoordinadorCarrera') }}" class="btn-floating btn-large waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Dar baja y reasignar"><i class="material-icons">add</i></a>
				</div>
			</div>

			@if (count($noactivos) === 0)

				<h5 class="center-align indigo-text">No hay docentes por activar en el sistema...</h5>

			@elseif(count($noactivos) != 0 && count($coordinadores_carr) < 4)
			<table class="bordered highlight centered responsive-table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Roles</th>
						<th>Cord. Carrera</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($docentes as $docente)
					<!-- Para que solo muestre los usuarios en activo 0 y que son del plantel que es el coordinador academico -->
					@if ($docente->activo == 0 && Auth::user()->plantel == $docente->plantel)
					<tr>
						<td>{{ $docente->nom_docente }}</td>

						@if ($docente->rol == 4)
						<td>Docente</td>
						@elseif($docente->rol == 2)
						<td>C. Carrera y Docente</td>
						@endif

						@if ($docente->c_carr == 'A')
						<td>IME</td>
						@elseif($docente->c_carr == 'B')
						<td>ITE</td>
						@elseif($docente->c_carr == 'C')
						<td>IMT</td>
						@elseif($docente->c_carr == 'D')
						<td>ISC</td>
						@elseif($docente->c_carr == 'N')
						<td>Solo docente</td>
						@endif

						<td>
							<div style="display: inline-flex;">

								<a href="{{ route('asignarCoordinadorCarrera', $docente->id) }}" class="waves-effect waves-light green btn tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar C. Carrera"><i class="material-icons">create</i></a>

								<form action="{{ route('formvalidarAsignarUsuarios', $docente->id) }}" method="POST">
									{!! csrf_field() !!}
									{!! method_field('PUT') !!}

									<input type="hidden" name="activo" value="1">

									<button style="margin-left: 10px;" class="btn waves-effect waves-light blue tooltipped" data-position="right" data-delay="50" data-tooltip="Activar" type="submit">
										<i class="material-icons">check</i>
									</button>
								</form>
							</div>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>

		    @elseif(count($noactivos) != 0 && count($coordinadores_carr) === 4)
		    <table class="bordered highlight centered responsive-table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Roles</th>
						<th>Cord. Carrera</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($docentes as $docente)
					<!-- Para que solo muestre los usuarios en activo 0 y que son del plantel que es el coordinador academico -->
					@if ($docente->activo == 0 && Auth::user()->plantel == $docente->plantel)
					<tr>
						<td>{{ $docente->nom_docente }}</td>

						@if ($docente->rol == 4)
						<td>Docente</td>
						@elseif($docente->rol == 2)
						<td>C. Carrera y Docente</td>
						@endif

						@if ($docente->c_carr == 'A')
						<td>IME</td>
						@elseif($docente->c_carr == 'B')
						<td>ITE</td>
						@elseif($docente->c_carr == 'C')
						<td>IMT</td>
						@elseif($docente->c_carr == 'D')
						<td>ISC</td>
						@elseif($docente->c_carr == 'N')
						<td>Solo docente</td>
						@endif

						<td>
							<div style="display: inline-flex;">
{{-- 
								<a href="{{ route('asignarCoordinadorCarrera', $docente->id) }}" class="waves-effect waves-light green btn tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar C. Carrera"><i class="material-icons">create</i></a> --}}

								<form action="{{ route('formvalidarAsignarUsuarios', $docente->id) }}" method="POST">
									{!! csrf_field() !!}
									{!! method_field('PUT') !!}

									<input type="hidden" name="activo" value="1">

									<button style="margin-left: 10px;" class="btn waves-effect waves-light blue tooltipped" data-position="right" data-delay="50" data-tooltip="Activar" type="submit">
										<i class="material-icons">check</i>
									</button>
								</form>
							</div>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
			@endif
		</div>

	</div>
</div>

@endsection






{{-- ____________________________________________________________________________________--}}


{{-- @extends('coordinador.modulos.plantilla')

@section('title', 'Válidar y Asignar Usuarios')

@section('contenido')

<div class="row">
	<div class="col s12">

		<div class="card-panel green lighten-4">

			<h5>Validar y dar de alta a coordinadores de carrera y docentes</h5>

			<div class="row">
			<div class="col s1 offset-s11">
		
			<a href="{{ route('darBajaReasignarCoordinadorCarrera') }}" class="btn-floating btn-large waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Dar baja y reasignar"><i class="material-icons">add</i></a>
				</div>
			</div>


			@if (count($noactivos) === 0)
				<h5 class="center-align indigo-text">No hay docentes por activar en el sistema...</h5>
			@else
			<table class="bordered highlight centered responsive-table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Roles</th>
						<th>Cord. Carrera</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($docentes as $docente)
					<!-- Para que solo muestre los usuarios en activo 0 y que son del plantel que es el coordinador academico -->
					@if ($docente->activo == 0 && Auth::user()->plantel == $docente->plantel)
					<tr>
						<td>{{ $docente->nom_docente }}</td>

						@if ($docente->rol == 4)
						<td>Docente</td>
						@elseif($docente->rol == 2)
						<td>C. Carrera y Docente</td>
						@endif

						@if ($docente->c_carr == 'A')
						<td>IME</td>
						@elseif($docente->c_carr == 'B')
						<td>ITE</td>
						@elseif($docente->c_carr == 'C')
						<td>IMT</td>
						@elseif($docente->c_carr == 'D')
						<td>ISC</td>
						@elseif($docente->c_carr == 'N')
						<td>Solo docente</td>
						@endif

						<td>
							<div style="display: inline-flex;">

								@php
								$roles = $docente->rol;
								$rol = explode(',', $roles);
								@endphp

								@if ($rol[0] == 2 && $rol[1] == 4)

								@elseif($rol[0] == 4)

								<a href="{{ route('asignarCoordinadorCarrera', $docente->id) }}" class="waves-effect waves-light green btn tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar C. Carrera"><i class="material-icons">create</i></a>
								@endif

								<form action="{{ route('formvalidarAsignarUsuarios', $docente->id) }}" method="POST">
									{!! csrf_field() !!}
									{!! method_field('PUT') !!}

									<input type="hidden" name="activo" value="1">

									<button style="margin-left: 10px;" class="btn waves-effect waves-light blue tooltipped" data-position="right" data-delay="50" data-tooltip="Activar" type="submit">
										<i class="material-icons">check</i>
									</button>
								</form>
							</div>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
			@endif
		</div>

	</div>
</div>

@endsection --}}