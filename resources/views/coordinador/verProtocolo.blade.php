@extends('coordinador.modulos.plantilla')

@section('title', 'Protocolos')

@section('contenido')

<div class="col-md-12 col-md-offset-0">

<div style="margin-bottom: 10px;">
	<a class="waves-effect waves-light btn right" href="{{ route('verProtocolosCoordinador') }}"><i class="material-icons left">arrow_back</i>Atrás</a>	
</div>

	<div style="margin-top: 20px;">
	<img style="width: 150px; height: 150px;" src="{{ url('images/fie.jpg') }}" alt="">

	<img style="width: 150px; height: 150px; margin-left: 420px;" src="{{ url('images/ucol.jpg') }}" alt="">
	</div>

	<hr>
<h2 style="text-align: center;">{{ $protocolo->nom_protocolo }}</h2>

<h3 style="text-align: center;">{{ $protocolo->universidad }}</h3>
<h4 style="text-align: center;">{{ $protocolo->facultad }}</h4>
<h4 style="text-align: center;">{{ $protocolo->carrera }}</h4>
<hr>
<p style="text-align: justify;">{{ $protocolo->introduccion }}</p>
<p style="text-align: justify;">{{ $protocolo->antecedentes }}</p>
<p style="text-align: justify;">{{ $protocolo->objetivos }}</p>
<p style="text-align: justify;">{{ $protocolo->obj_particulares }}</p>
<p style="text-align: justify;">{{ $protocolo->justificacion }}</p>
<p style="text-align: justify;">{{ $protocolo->herramientas }}</p>
<p style="text-align: justify;">{{ $protocolo->entregables }}</p>
<p style="text-align: justify;">{{ $protocolo->entregables }}</p>
<p style="text-align: justify;">{{ $protocolo->preguntas_guia }}</p>

<form action="{{ route('aceptarProtocolo', $protocolo->id) }}" method="POST">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}

	<input type="hidden" name="aceptado" value="1">

	<button type="submit" class="btn btn-primary btn-block">Aceptar</button>
</form>

</div>

@endsection