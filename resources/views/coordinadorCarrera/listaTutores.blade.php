@extends('coordinadorCarrera.modulos.plantilla')

@section('title', 'Tutores Asignados')

@section('contenido')

<div class="row">
	<div class="col s6 offset-s3">

    <div class="card-panel hoverable green lighten-4">
    	<ul class="collection with-header">
        <li class="collection-header green lighten-3"><h4>Tutores de Proyecto</h4></li>
        
        @if (count($tutores) == 0)
        	<h5 class="blue-text center-align">No tienes tutores asignados</h5>
        @else
          @foreach ($tutores as $tutor)
        	    <li class="collection-item green lighten-4">{{ $tutor->nom_docente }}</li>
        @endforeach
        @endif
      </ul>
    </div>

</div>
</div>
@endsection
