@extends('coordinador.modulos.plantilla')

@section('title', 'Alta Tutores')

@section('contenido')

@if (Session::has('info'))
	<div class="alert alert-success">
		{{ Session::get('info') }}
	</div>
@endif

<div class="row">
	<div class="col s12">

		<div class="card-panel green lighten-4">
			<h4 class="center-align">Alta tutores para los coordinadores de carrera</h4>
			<br>
			@if (count($coordinadores_carr) === 0)
				<h5 class="center-align indigo-text">No hay coordinadores de carrera dados de alta todavía...</h5>
			@else
			<table class="bordered highlight centered responsive-table">

				<thead>
					<tr>
						<th>Coordinador de Carrera</th>
						<th>Área</th>
						<th>Tutores de Proyecto Integrador</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($docentes as $docente)
					@if ($docente->c_carr != 'N' && $docente->c_carr != 'Z' && Auth::user()->plantel == $docente->plantel && $docente->activo == 1)
					<tr>
						<td>{{ $docente->nom_docente }}</td>

						{{-- <td>{{ $docente->rol }}</td> --}}

						@if ($docente->c_carr == 'A')
						<td>Ing. Mécanico</td>
						@elseif($docente->c_carr == 'B')
						<td>Ing. Tecnologías</td>
						@elseif($docente->c_carr == 'C')
						<td>Ing. Mecatrónica</td>
						@elseif($docente->c_carr == 'D')
						<td>Ing. Sistemas</td>
						@endif

						<td>
							@foreach ($tutores as $tutor)
							@if ($docente->c_carr == $tutor->t_proy)
							<ul>
								<li>{{ $tutor->nom_docente }} <b>{{ $tutor->t_proy }}, {{ $tutor->t_semestre }}</b></li>
							</ul>
							@endif
							@endforeach

						</td>

						<td>
							<a href="{{ route('asignarTutores', $docente->id) }}" class="waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Asignar Tutores"><i class="material-icons">mode_edit</i></a>		
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




{{-- __________________________________________________________________________________ --}}


{{-- @extends('coordinador.modulos.plantilla')

@section('title', 'Alta Tutores')

@section('contenido')

@if (Session::has('info'))
	<div class="alert alert-success">
		{{ Session::get('info') }}
	</div>
@endif

<div class="row">
	<div class="col s12">

		<div class="card-panel green lighten-4">
			<h4>Alta tutores para los coordinadore de carrera</h4>
			<table class="bordered highlight centered responsive-table">

				<thead>
					<tr>
						<th>Coordinador de Carrera</th>
						<th>Areá</th>
						<th>Tutores de Proyecto Integrador</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($docentes as $docente)
					@if ($docente->c_carr != 'N' && $docente->c_carr != 'Z' && Auth::user()->plantel == $docente->plantel)
					<tr>
						<td>{{ $docente->nom_docente }}</td> --}}
                       

                       {{-- ESTE NO --}}
						{{-- <td>{{ $docente->rol }}</td> --}}

						{{-- @if ($docente->c_carr == 'A')
						<td>Ing. Mécanico</td>
						@elseif($docente->c_carr == 'B')
						<td>Ing. Tecnologías</td>
						@elseif($docente->c_carr == 'C')
						<td>Ing. Mecatrónica</td>
						@elseif($docente->c_carr == 'D')
						<td>Ing. Sistemas</td>
						@endif

						<td>
							@foreach ($tutores as $tutor)
							@if ($docente->c_carr == $tutor->t_proy)
							<ul>
								<li>{{ $tutor->nom_docente }} <b>{{ $tutor->t_proy }}, {{ $tutor->t_semestre }}</b></li>
							</ul>
							@endif
							@endforeach

						</td>

						<td>

							<a href="{{ route('asignarTutores', $docente->id) }}" class="waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Asignar Tutores"><i class="material-icons">mode_edit</i></a>		
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection --}}