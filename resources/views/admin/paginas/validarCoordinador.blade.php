@extends('admin.modulos.plantilla')

@section('title', 'Válidar Coordinador')

@section('contenido')

<div class="row">
	<div class="col s10 offset-s1">
	<h3>Válidar Coordinador</h3>

	@if (count($coordinador) === 1)
	<div class="row">
		<div class="col s1 offset-s11">
			<a href="{{ route('reasignarCoordinador') }}" class="btn-floating btn-large waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Reasignar Coordinador Académico"><i class="material-icons">add</i></a>
		</div>
	</div>
		<table class="table bordered hover centered responsive-table">
		<thead>
			<tr>
				<th>Docente</th>
				<th>Roles</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($docentes as $docente)

			@if ($docente->activo == 0)
			<tr>
				<td>{{ $docente->nom_docente }}</td>

				@if ($docente->rol == 4)
				  <td>Sólo docente</td>
				@elseif($docente->rol == 1)
				  <td>Coordinador y docente</td>
				@endif

				<td>
				<div style="display: inline-flex;">
						
                        {{-- Formulario para activar docentes en el sistema (coordinador academico), tambien puede activar a otros docentes, cambia el campo 'activo' de 0 a 1 --}}
						<form style="margin-left: 20px;" action="{{ route('formValidarCoordinador', $docente->id) }}" method="POST">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}

							<input type="hidden" name="activo" value="1">

							{{-- <button type="submit" class="btn btn-info btn-xs">Válidar  <i class="medium material-icons">done</i></button> --}}

							<button class="btn waves-effect waves-light green tooltipped" data-position="right" data-delay="50" data-tooltip="Activar" type="submit"><i class="material-icons">done</i>
							</button>
						</form>

					</div>
				</td>
			</tr>
			@endif
			@endforeach
		</tbody>
	</table>

  {{-- ´Cuando no esta asignado el coordinador academico --}}
     @else

     <div class="card-panel light-blue lighten-5"><h5 class="red-text text-darken-2">"Primero asigna al coordinador académico y después activalo"</h5></div>

     <table class="table bordered hover centered responsive-table">
		<thead>
			<tr>
				<th>Docente</th>
				<th>Roles</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($docentes as $docente)

			@if ($docente->activo == 0)
			<tr>
				<td>{{ $docente->nom_docente }}</td>

				@if ($docente->rol == 4)
				  <td>Sólo docente</td>
				@elseif($docente->rol == 1)
				  <td>Coordinador y docente</td>
				@endif

				<td>
				<div style="display: inline-flex;">
						
						{{-- Formulario para asignar al coordinador academico (se cambia el campo 'rol en la tabla de: 4 a 1,4') --}}
						<form action="{{ route('datosCambiarRoles', $docente->id) }}" method="POST">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}

							<input type="hidden" name="rol[]" value="1">
							<input type="hidden" name="rol[]" value="4">

							<button class="btn waves-effect waves-light blue tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar como coordinador académico" type="submit"><i class="material-icons">mode_edit</i>
							</button>
						</form>

                        {{-- Formulario para activar docentes en el sistema (coordinador academico), tambien puede activar a otros docentes, cambia el campo 'activo' de 0 a 1 --}}
						<form style="margin-left: 20px;" action="{{ route('formValidarCoordinador', $docente->id) }}" method="POST">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}

							<input type="hidden" name="activo" value="1">

							{{-- <button type="submit" class="btn btn-info btn-xs">Válidar  <i class="medium material-icons">done</i></button> --}}

							<button class="btn waves-effect waves-light green tooltipped" data-position="right" data-delay="50" data-tooltip="Activar" type="submit"><i class="material-icons">done</i>
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
@endsection