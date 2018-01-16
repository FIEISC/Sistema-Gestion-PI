@extends('tutor.modulos.plantilla')

@section('title', 'Crear Protocolo')

@section('contenido')

<div class="row">
  <div class="col s12">
    <div class="card-panel green lighten-4">
      <h4>Crear Protocolo</h4>

      <form action="{{ route('crearProtocoloForm') }}" method="POST">

    {!! csrf_field() !!}

   <div class="row">
      <div class="input-field col s12">
          <input id="nom_protocolo" name="nom_protocolo" type="text" class="validate">
          <label for="nom_protocolo">Nombre del protocolo</label>
    </div>
   </div>
    
    <div class="row">
        <div class="input-field col s12">
          <input value="Universidad de Colima" name="universidad" id="universidad" type="text" class="validate black-text" readonly="true">
          <label for="universidad" class="black-text">Universidad</label>
        </div>
    </div>

     <div class="row">
        <div class="input-field col s12">
          <input value="{{ Auth::user()->plantel->nom_plantel }}" name="facultad" id="facultad" type="text" class="validate black-text" readonly="true">
          <label for="facultad" class="black-text">Facultad</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input value="{{ $carrera->nom_carrera }}" name="carrera" id="carrera" type="text" class="validate black-text" readonly="true">
          <label for="carrera" class="black-text">Carrera</label>
        </div>
    </div>


      <div class="row">
        <div class="input-field col s12">
          <textarea name="introduccion" id="introduccion" class="materialize-textarea"></textarea>
          <label for="introduccion">Introducción</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="antecedentes" id="antecedentes" class="materialize-textarea"></textarea>
          <label for="antecedentes">Antecedentes</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="objetivos" id="objetivos" class="materialize-textarea"></textarea>
          <label for="objetivos">Objetivos</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="obj_particulares" id="obj_particulares" class="materialize-textarea"></textarea>
          <label for="obj_particulares">Objetivos Particulares</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="justificacion" id="justificacion" class="materialize-textarea"></textarea>
          <label for="justificacion">Justificación</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="herramientas" id="herramientas" class="materialize-textarea"></textarea>
          <label for="herramientas">Herramientas</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="entregables" id="entregables" class="materialize-textarea"></textarea>
          <label for="entregables">Entregables</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="preguntas_guia" id="preguntas_guia" class="materialize-textarea"></textarea>
          <label for="preguntas_guia">Preguntas Guía</label>
        </div>
      </div>

    <input type="hidden" name="semestre" value="{{ Auth::user()->t_semestre }}">

    <div class="row">   
      <div class="col-md-6">
       <div class="form-group">
        <label for="date" class="form-control text-center">Fecha de Inicio</label>
        <div class="input-group">
          <input type="text" class="validate" name="fec_ini" value="{!!date('20y-m-d') !!}" readonly="true">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6">
     <div class="form-group">
       <label for="date" class="form-control text-center">Fecha Fin</label>
       <div class="input-group">
      

        <input type="date" class="datepicker" name="fec_fin">
        <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
        </div>
      </div>
    </div>
  </div>
</div>

    <br>
    <input type="hidden" name="carrera_id" value="{{ $carrera->id }}">

    <input type="hidden" name="ciclo_id" value="{{ $ciclo->id }}">

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


   <button class="btn waves-effect waves-light" type="submit">Crear
    <i class="material-icons right">send</i>
  </button>

  </form>

</div>
  
</div>
</div>
@endsection

