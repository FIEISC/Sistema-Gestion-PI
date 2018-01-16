@extends('coordinadorCarrera.modulos.plantilla')

@section('title', 'Ver Protocolo')

@section('contenido')

<div class="row">
  <div class="col s12">
    <div class="card light-blue lighten-5">
      <div class="card-content black-text">
  
         <h5 class="center-align">{{ $protocolo->universidad }}</h5>
         <h5 class="center-align">{{ $protocolo->facultad }}</h5>
         <h5 class="center-align">{{ $protocolo->carrera }}</h5>
         <h5 class="center-align">{{ $protocolo->nom_protocolo }}</h5>
         <h5 class="center-align">Semestre: {{ $protocolo->semestre }}</h5>
         <hr>
         <p><b>Introducción:</b></p>
         <p  class="text-justify">{{ $protocolo->introduccion }}</p>
         <br>
          <p><b>Antecedentes:</b></p>
         <p  class="text-justify">{{ $protocolo->antecedentes }}</p>
         <br>
          <p><b>Objetivos:</b></p>
         <p  class="text-justify">{{ $protocolo->objetivos }}</p>
         <br>
          <p><b>Objetivos particulares:</b></p>
         <p  class="text-justify">{{ $protocolo->obj_particulares }}</p>
         <br>
          <p><b>Justificación:</b></p>
         <p  class="text-justify">{{ $protocolo->justificacion }}</p>
         <br>
          <p><b>Herramientas:</b></p>
         <p  class="text-justify">{{ $protocolo->herramientas }}</p>
         <br>
          <p><b>Entregables:</b></p>
         <p  class="text-justify">{{ $protocolo->entregables }}</p>
         <br>
          <p><b>Preguntas guía:</b></p>
         <p  class="text-justify">{{ $protocolo->preguntas_guia }}</p>

        </div>

      </div>
    </div>
  </div>
            
@endsection




































































