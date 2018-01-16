@extends('tutor.modulos.plantilla')

@section('title', 'Crear Protocolo')

@section('contenido')

<div class="row">
  <div class="col s12">
    <div class="card-panel green lighten-4">

     <h4 class="center-align">Protocolos creados</h4>
      <br>
      @if (count($protocolos) === 0)
        <h5 class="blue-text center-align">No tienes protocolos creados todavía</h5>

      @else

       <table class="bordered highlight centered responsive-table">

          <thead>
            <tr>
              <th class="text-center">Título</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach ($protocolos as $protocolo)
            <tr>
             <td>{{ $protocolo->nom_protocolo }}</td>
             <td>

               <a class="waves-effect waves-light blue btn tooltipped" data-position="top" data-delay="50" data-tooltip="Ver Protocolo" href="#modal1"><i class="material-icons">visibility</i></a>

               <!-- Modal Structure -->
               <div id="modal1" class="modal">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">

                       <div class="col s1 offset-s11">
                        <a href="" class="modal-action modal-close"><i class="material-icons">close</i></a>
                      </div>

                    </div>

                    <div class="modal-body">
                      <h4 class="text-center">{{ $protocolo->universidad }}</h4>
                      <p class="text-center">{{ $protocolo->facultad }}</p>
                      <p class="text-center">{{ $protocolo->carrera }}</p>
                      <h5 class="text-center">{{ $protocolo->nom_protocolo }}</h5>
                      <p class="text-center">Semestre: {{ $protocolo->semestre }}</p>
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
                     <a href="" class="modal-action modal-close waves-effect waves-green btn">Cerrar</a>
                   </div>

                 </div>
               </div>
             </div>

             <a style="margin-left: 20px;" href="{{ route('editarOnlyProtocolo', $protocolo->id) }}" class="waves-effect waves-light orange btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar Protocolo"><i class="material-icons">mode_edit</i></a>


             <button style="margin-left: 20px;" class="btn waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Para dar de baja el protocolo por favor de ponerse en contacto con el coordinador académico"><i class="material-icons">arrow_downward</i>
             </button>

           </td>
         </tr>
         @endforeach
       </tbody>
      </table>

      @endif
   </div>
 </div>
</div>

@endsection

