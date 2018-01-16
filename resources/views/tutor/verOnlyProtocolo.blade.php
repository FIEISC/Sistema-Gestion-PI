@extends('tutor.modulos.plantilla')

@section('title', 'Crear Protocolo')

@section('contenido')

{{-- <div class="box3">
  <h2 class="text-center">{{ $protocolo->universidad }}</h2>
  <h3 class="text-center">{{ $protocolo->facultad }}</h3>
  <h3 class="text-center">{{ $protocolo->carrera }}</h3>

  <hr>
  <p class="text-center">{{ $protocolo->introduccion }}</p>
  <hr>
  <p class="text-center">{{ $protocolo->antecedentes }}</p>
  <hr>
  <p class="text-center">{{ $protocolo->objetivos }}</p>
</div> --}}

<h2>{{ $protocolo->nom_protocolo }}</h2>
<hr>
<h2>{{ $protocolo->universidad }}</h2>
<h3>{{ $protocolo->facultad }}</h3>
<h3>{{ $protocolo->carrera }}</h3>
<hr>
<p>{{ $protocolo->introduccion }}</p>
<hr>

@endsection

