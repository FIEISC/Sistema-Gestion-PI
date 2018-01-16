@extends('docente.modulos.plantilla')

@section('title', 'Notificaciones')

@section('contenido')

<h5>Notificaciones</h5>

<div class="row">
	<div class="col s6">
	 
	 <div class="card-panel hoverable lime lighten-4">
	 	<h4>No leídas</h4>

		<ul class="list-group">
			@foreach ($noLeidas as $noLeida)			
			<li class="list-group-item">

			<a href="{{ $noLeida->data['link'] }}">{{ $noLeida->data['asunto'] }}</a>

			<form action="{{ route('leidaNotificacion', $noLeida->id) }}" method="POST" class="pull-right"> 

			{!! method_field('PATCH') !!}
			{!! csrf_field() !!}

				{{-- <button class="btn btn-danger btn-xs">x</button> --}}

				<button class="btn waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Marcar como leída">
					<i class="material-icons">close</i>
				</button>
			</form>
			</li>
			@endforeach
		</ul>
	 </div>
		
	</div>

	<div class="col s6">
		
		<div class="card-panel hoverable light-blue lighten-4">
			<h4>Leídas</h4>

		<ul class="list-group">
			@foreach ($Leidas as $Leida)			
			<li class="list-group-item">
			<a href="{{ $Leida->data['link'] }}">{{ $Leida->data['asunto'] }}</a>

			<form action="{{ route('borrarNotificacion', $Leida->id) }}" method="POST" class="pull-right"> 

			{!! method_field('DELETE') !!}
			{!! csrf_field() !!}

				{{-- <button class="btn btn-danger btn-xs">x</button> --}}

				<button class="btn waves-effect waves-light red tooltipped" data-position="right" data-delay="50" data-tooltip="Borrar notificación">
					<i class="material-icons">close</i>
				</button>
			</form>
			</li>
			@endforeach
		</ul>
		</div>

	</div>
</div>

@endsection











































