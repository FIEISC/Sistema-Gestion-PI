@extends('coordinador.modulos.plantilla')

@section('title', 'Alta Tutores')

@section('contenido')

{{-- @foreach ($ciclos as $ciclo)
	@if ($ciclo->activo == 1)
	<p>{{ $ciclo->nom_ciclo }}</p>
	<p>{{ $ciclo->ciclo }}</p>
	@endif
@endforeach --}}

<div class="row">
	<div class="col s12">
	<h4>Asignar Tutores a: </h4>
	<p><b>{{ $cc->nom_docente }}</b></p>

	<table class="bordered highlight centered responsive-table">
		<thead>
			<tr>
				<th>Docente</th>
				<th>Rol</th>
				{{-- <th>Tutor</th> --}}
				<th>Semestre</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tutores as $tutor)
				@if ($tutor->activo == 1 && $tutor->rol != 0 && Auth::user()->plantel->id == $tutor->plantel->id && $tutor->t_proy == 'N')
					<tr>
						<td>{{ $tutor->nom_docente }}</td>

						@php
							$roles = $tutor->rol;
							$rol = explode(',', $roles);
						@endphp

						@if ($rol[0] == 1 && $rol[1] == 4)
							<td>C. Académico y Docente</td>
					    @elseif($rol[0] == 2 && $rol[1] == 4)
					        <td>C. Carrera y Docente</td>
					    @elseif($rol[0] == 4)
					        <td>Docente</td>
						@endif

					{{-- 	@if ($tutor->t_proy == 'N')
							<td>Solo Docente</td>
						@endif --}}

						<td>
							<form action="{{ route('asignarTutoresForm', $tutor->id) }}" method="POST">
								{!! csrf_field() !!}
								{!! method_field('PUT') !!}
							 
							   @if ($ciclo->ciclo == 1)
							    <div class="radio">
									<label id="1">
									<input type="radio" name="t_semestre" id="1" value="1">
										1
									</label>
								</div>

								<div class="radio">
									<label id="3">
									<input type="radio" name="t_semestre" id="3" value="3">
										3
									</label>
								</div>

								<div class="radio">
									<label id="5">
									<input type="radio" name="t_semestre" id="5" value="5">
										5
									</label>
								</div>

								@elseif($ciclo->ciclo == 2)
                                                        
								 <div class="radio">
									<label id="2">
									<input type="radio" name="t_semestre" id="2" value="2">
										2
									</label>
								</div>

								<div class="radio">
									<label id="4">
									<input type="radio" name="t_semestre" id="4" value="4">
										4
									</label>
								</div>

								<div class="radio">
									<label id="6">
									<input type="radio" name="t_semestre" id="6" value="6">
										6
									</label>
								</div>
							    	@endif
							 
								<input type="hidden" name="t_proy" value="{{ $cc->c_carr }}">

								@php
									$roles = $tutor->rol;
									$rol = explode(',', $roles);
								@endphp

									@if ($rol[0] == 1 && $rol[1] == 4)
										<input type="hidden" name="rol[]" value="1">
										<input type="hidden" name="rol[]" value="3">
										<input type="hidden" name="rol[]" value="4">
								    @elseif($rol[0] == 2 && $rol[1] == 4)
								         <input type="hidden" name="rol[]" value="2">
								         <input type="hidden" name="rol[]" value="3">
								         <input type="hidden" name="rol[]" value="4">
								    @elseif($rol[0] == 4)
								         <input type="hidden" name="rol[]" value="3">
								         <input type="hidden" name="rol[]" value="4">
									@endif
								
{{-- 
								<button type="submit" class="btn btn-info btn-xs">Asignar  <span class="glyphicon glyphicon-ok"></span></button> --}}

								<button class="btn waves-effect waves-light tooltipped" data-position="right" data-delay="50" data-tooltip="Asignar" type="submit">
									<i class="material-icons">check</i>
								</button>
							</form>
						</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
</div>

@endsection



{{-- Los radio buttos --}}

{{-- @if ($ciclo->ciclo == 1)

<p>
	<input name="t_semestre" type="radio" id="1" value="1">
	<label for="1">1</label>
</p>

<p>
	<input name="t_semestre" type="radio" id="3" value="3">
	<label for="3">3</label>
</p>

<p>
	<input name="t_semestre" type="radio" id="5" value="5">
	<label for="5">5</label>
</p>

@elseif($ciclo->ciclo == 2)

<p>
	<input name="t_semestre" type="radio" id="2" value="2">
	<label for="2">2</label>
</p>

<p>
	<input name="t_semestre" type="radio" id="4" value="4">
	<label for="4">4</label>
</p>

<p>
	<input name="t_semestre" type="radio" id="6" value="6">
	<label for="6">6</label>
</p>
@endif --}}