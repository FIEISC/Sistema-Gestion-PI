@extends('docente.modulos.plantilla')

@section('title', 'Protocolos')

@section('contenido')

<div class="row">
	<div class="col s12">
     <div class="card-panel green lighten-4">
     	<h5>Protocolos asignados</h5>
	<table class="bordered highlight centered responsive-table">
		<thead>
			<tr>
				<th>Protocolo</th>
				<th>Carrera</th>
				<th>Semestre</th>
				<th>Tutor</th>
				<th>Acciones</th>
			</tr>
		</thead>

	<tbody>
		@foreach ($docentes as $docente)
		    @if ($docente->id === Auth::user()->id)
		        @foreach ($docente->protocolos as $protocolo)
		           <tr>
		           	<td><a href="{{ route('infoDocenteProtocolo', $protocolo->id) }}">{{ $protocolo->nom_protocolo }}</a></td>
		           	<td>{{ $protocolo->carrera }}</td>
		           	<td>{{ $protocolo->semestre }}</td>
		           	<td>{{ $protocolo->user->nom_docente }}</td>
		           	<td>
		           	
		           	<div style="display: inline-flex;">
		           			{{-- <a href="{{ route('verProtocoloDocente', $protocolo->id) }}" class="btn btn-info btn-sm">Ver   <span class=" glyphicon glyphicon-eye-open"></span></a> --}}

		           		<a style="margin-right: 10px;" href="{{ route('verProtocoloDocente', $protocolo->id) }}" class="waves-effect waves-light blue btn tooltipped" data-position="top" data-delay="50" data-tooltip="Ver Protocolo"><i class="material-icons">visibility</i></a>

		           		{{-- <a href="{{ route('editarProtocoloDocente', $protocolo->id) }}" class="btn btn-warning btn-sm">Editar  <span class="glyphicon glyphicon-edit"></span></a> --}}

		           		<a href="{{ route('editarProtocoloDocente', $protocolo->id) }}" class="waves-effect waves-light orange btn tooltipped" data-position="right" data-delay="50" data-tooltip="Editar Protocolo"><i class="material-icons">edit</i></a>
		           	</div>

		           	</td>
		           </tr>
		        @endforeach
		    @endif
		@endforeach
	</tbody>
	</table>
     </div>

	</div>
</div>

@endsection











































