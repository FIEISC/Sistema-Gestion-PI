@extends('docente.modulos.plantilla')

@section('title', 'Info Protocolo')

@section('contenido')

<div class="row">
    <div class="col s6 offset-s3">
   <div class="card-panel green lighten-4 hoverable">
        <h4>Información General</h4>

    @if ($equipo === null)
        <p>No has sido asignado como tutor de equipo</p>

    @else
    <h6><b>Estas asignado al proyecto:</b></h6>
    <p>{{ $equipo->protocolo->nom_protocolo }}</p>

    <h6><b>Fecha límite para editar el protocolo:</b></h6>
    <p class="red-text"><b>{{ $equipo->protocolo->fec_fin }}</b></p>

    <h6><b>En la carrera de:</b></h6>
    <p>{{ $equipo->protocolo->carrera }}</p>

    <h6><b>En el semestre:</b></h6>
    <p>{{ $equipo->protocolo->semestre }}º</p>

    <h6><b>Eres tutor del equipo:</b></h6>
    <p>{{ $equipo->nom_equipo }}</p>

    <h6><b>De los alumnos:</b></h6>
     
     @if (count($alumnos) === 0)
         <p>No tienes alumnos asignados</p>
      @else
        @foreach ($alumnos as $alumno)
        @if ($alumno->equipo_id == $equipo->id)
        <ul>
            <li>{{ $alumno->nom_alumno }}</li>
        </ul>
        @endif
    @endforeach
     @endif

    @endif
   </div>

   <div class="card-panel teal lighten-2">Cualquier duda o aclaración, favor de ponerse en contacto con el tutor del proyecto <b>{{ $protocolo->tutorProyecto->nom_docente }}</b></div>
</div>
</div>


@endsection











































