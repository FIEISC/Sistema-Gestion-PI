@extends('admin.modulos.plantilla')

@section('title', 'Editar Plantel')

@section('contenido')

<div class="col-md-8 col-md-offset-2">

<form action="{{ route('datosPlantelModificar', $plantel->id) }}" method="POST">

	{{ csrf_field() }}
	{{ method_field('PUT') }}

	<div class="row">
        <div class="input-field col-md-12">
          <input name="nom_plantel" id="nom_plantel" type="text" class="validate" value="{{ $plantel->nom_plantel }}">
          <label for="nom_plantel">Nombre del plantel</label>
        </div>
     </div>

     <div class="row">
        <div class="input-field col-md-12">
          <input name="siglas" id="siglas" type="text" class="validate" value="{{ $plantel->siglas }}">
          <label for="siglas">Siglas del plantel</label>
        </div>
     </div>

      <div class="row">
        <div class="input-field col s12">
          <input disabled value="{{ $plantel->campus->nom_campus }}" id="disabled" type="text" class="validate">
          <label for="disabled">Campus</label>
        </div>
      </div>

      <div class="input-field col s12">
      	<select name="campus_id">
      	{{-- <option value="" disabled selected>Elegir Campus</option> --}}
      		@foreach ($campus as $campu)
      			<option value="{{ $campu->id }}">{{ $campu->nom_campus }}</option>
      		@endforeach
      	</select>
      	<label>Modificar campus</label>
      </div>
      
      <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>

</form>
</div>

@endsection