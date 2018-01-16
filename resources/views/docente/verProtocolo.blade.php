@extends('docente.modulos.plantilla')

@section('title', 'Ver Protocolo')

@section('contenido')

<div class="row">
	<div class="col s10 offset-s1"> 
       <div class="card-panel hoverable green lighten-4">

    <h5>Informacion del protocolo</h5>
    <hr>
    <h5 class="text-center">{{ $protocolo->universidad }}</h5>
    <h5 class="text-center">{{ $protocolo->facultad }}</h5>
    <h5 class="text-center">{{ $protocolo->carrera }}</h5>
	<h5 class="text-center">{{ $protocolo->nom_protocolo }}</h5>
	{{-- <h5 class="text-center">{{ $protocolo->semestre }}</h5>
	<h5>{{ $protocolo->carrer->grupo }}</h5> --}}
	<hr>

	<p class="text-justify">{{ $protocolo->introduccion }}</p>
	<p class="text-justify">{{ $protocolo->antecedentes }}</p>
	<p class="text-justify">{{ $protocolo->objetivos }}</p>
	<p class="text-justify">{{ $protocolo->obj_particulares }}</p>
	<p class="text-justify">{{ $protocolo->justificacion }}</p>
	<p class="text-justify">{{ $protocolo->herramientas }}</p>
	<p class="text-justify">{{ $protocolo->entregables }}</p>
	<p class="text-justify">{{ $protocolo->preguntas_guia }}</p>
      </div>

	</div>
</div>


@endsection











































