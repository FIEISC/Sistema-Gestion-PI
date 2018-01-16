@extends('tutor.modulos.plantilla')

@section('title', 'Editar Protocolo')

@section('contenido')

<div class="col-md-10 col-md-offset-1">
	<h1 class="text-center">Editar Protocolo</h1>

{{-- 	<h3>{{ $protocolo->nom_protocolo }}</h3> --}}

	<form action="{{ route('editarOnlyProtocoloForm', $protocolo->id) }}" method="POST">

		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		<div class="form-group">
			<label for="nom_protocolo">Nombre del Protocolo</label>
			<input type="text" name="nom_protocolo" class="form-control" value="{{ $protocolo->nom_protocolo }}">
		</div>

		<div class="form-group">
			<label for="introduccion">Introducción</label>
			<textarea name="introduccion" id="introduccion" cols="30" rows="5" class="form-control">{{ $protocolo->introduccion }}</textarea>
		</div>

		<div class="form-group">
			<label for="antecedentes">Antecedentes</label>
			<textarea name="antecedentes" id="antecedentes" cols="30" rows="5" class="form-control">{{ $protocolo->antecedentes }}</textarea>
		</div>

		<div class="form-group">
			<label for="objetivos">Objetivos</label>
			<textarea name="objetivos" id="objetivos" cols="30" rows="5" class="form-control">{{ $protocolo->objetivos }}</textarea>
		</div>

		<div class="form-group">
			<label for="obj_particulares">Objetivos Particulares</label>
			<textarea name="obj_particulares" id="obj_particulares" cols="30" rows="5" class="form-control">{{ $protocolo->obj_particulares }}</textarea>
		</div>

		<div class="form-group">
			<label for="justificacion">Justificación</label>
			<textarea name="justificacion" id="justificacion" cols="30" rows="5" class="form-control">{{ $protocolo->justificacion }}</textarea>
		</div>

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

		    <div class="row">   
      <div class="col-md-6">
   <div class="form-group">
          <label for="date" class="form-control text-center">Fecha de Inicio</label>
        <div class="input-group">
          <input type="text" class="form-control datepicker" name="fec_ini" value="{!!date('20y-m-d') !!}" readonly="true">
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
        <input type="text" class="form-control datepicker" name="fec_fin" value="{{ $protocolo->fec_fin }}">
        <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
        </div>
      </div>
     </div>
      </div>
    </div>

   <br>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Editar  <span class="glyphicon glyphicon-edit"></span></button>
		</div>
	</form>

</div>

@endsection

