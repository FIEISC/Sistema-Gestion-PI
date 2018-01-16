@extends('modulos.plantilla')

@section('title', 'Registro')

@section('contenido')

<div class="row">
  <div class="col s12 md-12">

<div class="card-panel green lighten-4">
  @php
  $hoy = date('20y-m-d');
@endphp
 
@if ($hoy <= $protocolo->fec_fin || $protocolo->aceptado == 0)
  <p>El protocolo no ha sido publicado aun, espera que lo publiquen</p>

@elseif($hoy >= $protocolo->fec_fin && $protocolo->aceptado == 1)
  <table class="bordered highlight centered responsive-table">
    <thead>
      <th>Alumno</th>
      <th>Equipo</th>
      <th>Tutor de Equipo</th>
      <th>Protocolo</th>
      <th>Acciones</th>
    </thead>

   <tbody>
     @foreach ($alumnos as $alumno)
       <tr>
         <td>{{ $alumno->nom_alumno }}</td>

         <td>{{ $alumno->equipo->nom_equipo }}</td>

         @foreach ($equipos as $equipo)
           @if ($equipo->id == $alumno->equipo_id)
              <td>{{ $equipo->user->nom_docente }}</td>
           @endif
         @endforeach

         <td>{{ $protocolo->nom_protocolo }}</td>

          <td>
        <div style="display: inline-flex;">
           {{--  <button style="margin-left: 50px;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ventana">Ver  <span class="glyphicon glyphicon-eye-open"></span></button> --}}

       {{--   <button style="margin-right: 10px;" class="btn waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Ver Protocolo" type="button"><i class="material-icons">visibility</i>
        </button> --}}

         <a style="margin-right: 10px;" class="waves-effect waves-light btn tooltipped modal-trigger" data-position="top" data-delay="50" data-tooltip="Ver Protocolo" href="#modal1"><i class="material-icons">visibility</i></a>

         <div id="modal1" class="modal">
          <div class="modal-content">
            <img style="width: 130px; height: 130px;" src="{{ url('images/fie.jpg') }}" alt="">
            <img style="width: 130px; height: 130px; margin-left: 300px;" src="{{ url('images/ucol.jpg') }}" alt="">

            <hr>
                  <h5 class="text-center">{{ $protocolo->universidad }}</h5>
                  <h5 class="text-center">{{ $protocolo->facultad }}</h5>
                  <h5 class="text-center">{{ $protocolo->carrera }}</h5>
                  <h5 class="text-center">Semestre: {{ $protocolo->semestre }}</h5>
                  <hr>

                  <h5 class="text-center">{{ $protocolo->nom_protocolo }}</h5>
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
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
          </div>
        </div>

           {{-- <div class="modal fade" id="ventana">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h3>Información del protocolo</h3>
                 </div>

                 <div class="modal-body">
                
                  <h4 class="text-center">{{ $protocolo->universidad }}</h4>
                  <h4 class="text-center">{{ $protocolo->facultad }}</h4>
                  <h4 class="text-center">{{ $protocolo->carrera }}</h4>
                  <h4 class="text-center">Semestre: {{ $protocolo->semestre }}</h4>
                  <hr>

                  <h3 class="text-center">{{ $protocolo->nom_protocolo }}</h3>
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

                 <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                 </div>

               </div>
             </div>
           </div> --}}

         {{--  <a href="{{ route('descargarProtocolo', $protocolo->id) }}" class="btn btn-info btn-sm">Descargar  <span class="glyphicon glyphicon-download-alt"></span></a> --}}

         <a href="{{ route('descargarProtocolo', $protocolo->id) }}" class="waves-effect waves-green lighten-3 btn tooltipped" data-position="right" data-delay="50" data-tooltip="Descargar Protocolo"><i class="material-icons">system_update_alt</i></a>
        </div>
          </td>
       </tr>
     @endforeach
   </tbody>
  </table>
  
@endif  {{-- Fin del if para validar que el protocolo cumpla con la fecha establecida para ser publicado --}}
</div>

</div>
</div>
@endsection































