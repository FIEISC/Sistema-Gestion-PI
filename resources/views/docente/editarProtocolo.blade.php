@extends('docente.modulos.plantilla')

@section('title', 'Editar Protocolo')

@section('contenido')

<div class="row">
<div class="col s10 offset-s1">

@php
	$hoy = date('20y-m-d');
	/*print_r($hoy);*/
@endphp

<div class="card-panel hoverable green lighten-4">
	<h3 class="center">Editar Protocolo</h3>

@if ($hoy >= $protocolo->fec_ini && $hoy <= $protocolo->fec_fin)

<h5>{{ $protocolo->nom_protocolo }}</h5>

<form action="{{ route('datosEditarProtocoloDocente', $protocolo->id) }}" method="POST">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}

	<div class="form-group">
			<label for="herramientas">Herramientas</label>
			<textarea name="herramientas" id="herramientas" cols="30" rows="5" class="form-control">{{ $protocolo->herramientas }}</textarea>
		</div>

		<div class="form-group">
			<label for="entregables">Entregables</label>
			<textarea name="entregables" id="entregables" cols="30" rows="5" class="form-control">{{ $protocolo->entregables }}</textarea>
		</div>

		<div class="form-group">
			<label for="preguntas_guia">Preguntas Guía</label>
			<textarea name="preguntas_guia" id="preguntas_guia" cols="30" rows="5" class="form-control">{{ $protocolo->preguntas_guia }}</textarea>
		</div>

		{{-- <button type="submit" class="btn btn-primary btn-block">Editar</button> --}}

		<button class="btn waves-effect waves-light btn-block" type="submit">Editar
			<i class="material-icons right">send</i>
		</button>
</form>

@else
<h4 class="red-text text-darken-4 text-justify">El tiempo para editar el protocolo ya ha pasado, ponte en contacto con el tutor de proyecto.</h4>

@endif
</div>
</div>
</div>


@endsection











































