@extends('admin.modulos.plantilla')

@section('title', 'Editar Carrera')

@section('contenido')

<div class="row">
	<div class="col-s6 offset-3">
		<div class="card-panel green lighten-4">
			<table class="bordered highlight centered responsive-table">
				<thead>
					<tr>
						<th>Ciclo</th>
						<th>Fecha de inicio</th>
						<th>Fecha de termino</th>
						<th>Acción</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($ciclos as $ciclo)
						@if ($ciclo->activo == 1)
						<tr>
							<td>{{ $ciclo->nom_ciclo }}</td>
							<td>{{ $ciclo->fec_ini }}</td>
							<td>{{ $ciclo->fec_fin }}</td>
							<td>
								<a href="{{ route('editarCicloActual', $ciclo->id) }}" class="waves-effect waves-light btn tooltipped" data-position="botton" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>

								<a href="#modal1" class="waves-effect red btn tooltipped modal-trigger" data-position="right" data-delay="50" data-tooltip="Baja"><i class="material-icons">arrow_downward</i></a>


								<!-- Modal Structure -->
								<div id="modal1" class="modal">
									<div class="modal-content">
										<h4>Confirmación de baja del ciclo escolar</h4>
										<p>¿Estás seguro que quieres dar de baja el ciclo escolar actual?</p>
									</div>
									<div class="modal-footer">
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>

										<form action="{{ route('bajaCicloActual', $ciclo->id) }}" method="POST">
										{!! csrf_field() !!}
										{!! method_field('PUT') !!}

											<input type="hidden" value="0" name="activo">

											<button type="submit" class="btn btn-primary btn-block">Baja</button>
										</form>
									</div>
								</div>

							</td>
						</tr>

						@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection








































