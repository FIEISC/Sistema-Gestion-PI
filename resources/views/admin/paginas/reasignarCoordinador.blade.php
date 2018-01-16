@extends('admin.modulos.plantilla')

@section('title', 'Reasignar Coordinador')

@section('contenido')

<div class="row">
	<div class="col s8 offset-s2">
<div class="row">
<h5>Quitar Coordinador</h5>

		<table class="bordered highlight centered responsive-table">
	<thead>
		<tr>
			<th>Coordinador Académico Actual</th>
			<th>Acción</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($docentes as $docente)
		<tr>
			@if ($docente->rol == 1)
			<td>{{ $docente->nom_docente }}</td>
			<td>
				<form action="{{ route('quitarCoordinadorForm', $docente->id) }}" method="POST">

				{!! csrf_field() !!}
				{!! method_field('PUT') !!}

					<input type="hidden" name="rol[]" value="4">

					<button class="btn waves-effect waves-light red tooltipped" data-position="right" data-delay="50" data-tooltip="Quitar CA" type="submit">
						<i class="material-icons">close</i>
					</button>
				</form>
			</td>
			@endif 
		</tr>
		@endforeach
	</tbody>
</table>
</div>

<div class="row">
<h5>Reasignar Coordinador</h5>
	<table class="bordered highlight centered responsive-table">
		<thead>
			<tr>
				<th>Docentes</th>
				<th>Acción</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($docentes as $docente)
				<tr>
					@if ($docente->rol == 4 && $docente->activo == 1)
					<td>{{ $docente->nom_docente }}</td>
					<td>
						<form action="{{ route('reasignarCoordinadorForm', $docente->id) }}" method="POST">

						{!! csrf_field() !!}
				        {!! method_field('PUT') !!}

							<input type="hidden" name="rol[]" value="1">
							<input type="hidden" name="rol[]" value="4">

							<button class="btn waves-effect waves-light green tooltipped" data-position="right" data-delay="50" data-tooltip="Asignar CA" type="submit">
								<i class="material-icons">check</i>
							</button>
						</form>
					</td>
				@endif
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>


</div>
@endsection








































