@extends('docente.modulos.plantilla')

@section('title', 'Notificaciones')

@section('contenido')

<div class="row">
	<div class="col s6 offset-s3">
		<div class="card-panel hoverable green lighten-4">
			<h3>Mensaje</h3>

			<h5>Asunto: </h5>
			<p>{{ $mensaje->asunto }}</p>

			<h5>Mensaje: </h5>
			<p>{{ $mensaje->mensaje }}</p>

			<h5>Enviado por: </h5>
			<p>{{ $mensaje->sender->nom_docente }}</p>
		</div>
	</div>
</div>

@endsection











































