@extends('coordinadorCarrera.modulos.plantilla')

@section('title', 'Alta Tutores')

@section('contenido')

<div class="col-md-8 col-md-offset-2">
	<h1>Alta de tutores de proyecto</h1>

	<table class="table table-bordered table-hover table-responsive">
		<thead>
			<tr>
				<th>Docente</th>
				<th>Tutor</th>
				<th>Roles</th>
				<th>C. Carrera</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($docentes as $docente)
				@if ($docente->rol != 0 && $docente->activo == 1 && Auth::user()->plantel == $docente->plantel)
				<tr>
					<td>{{ $docente->nom_docente }}</td>

					@if ($docente->t_proy == 'N')
						<td>NO tutor</td>
					@endif

					@if ($docente->rol == 1)
						<td>C. Académico y Docente</td>
				    @elseif($docente->rol == 2)
				        <td>C. Carrera y Docente</td>
				    @elseif($docente->rol == 4)
				        <td>Solo Docente</td>
					@endif

					<td>{{ $docente->c_carr }}</td>

					<td>
						<a href="{{ route('asignarAltaTutoresProyecto', $docente->id) }}" class="btn btn-default btn-xs">Asignar  <span class="glyphicon glyphicon-pencil"></span></a>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
@endsection