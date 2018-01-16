@extends('tutor.modulos.plantilla')

@section('title', 'Tutor de PI')

@section('contenido')

<div class="row">
  <div class="col s12">
    @if (Auth::user()->t_proy == 'A')
  
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Tutor de Proyecto</h3>
  </div>
  <div class="panel-body">
    <h3>Bienvenido: {{ Auth::user()->nom_docente }}</h3>
    <h4>Es tutor de la carrera: Ing. Mecánico Electricista</h4>
    <h4>En el semestre: {{ Auth::user()->t_semestre }}</h4>
  </div>
</div>

@elseif(Auth::user()->t_proy == 'B')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Tutor de Proyecto</h3>
  </div>
  <div class="panel-body">
    <h3>Bienvenido: {{ Auth::user()->nom_docente }}</h3>
    <h4>Es tutor de la carrera: Ing. en Tecnologías Electrónicas</h4>
    <h4>En el semestre: {{ Auth::user()->t_semestre }}</h4>
  </div>
</div>

@elseif(Auth::user()->t_proy == 'C')

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Tutor de Proyecto</h3>
  </div>
  <div class="panel-body">
    <h3>Bienvenido: {{ Auth::user()->nom_docente }}</h3>
    <h4>Es tutor de la carrera: Ing. en Mecatrónica</h4>
    <h4>En el semestre: {{ Auth::user()->t_semestre }}</h4>
  </div>
</div>
@elseif(Auth::user()->t_proy == 'D')


{{--   <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Tutor de Proyecto</h3>
  </div>
  <div class="panel-body">
    <h3>Bienvenido: {{ Auth::user()->nom_docente }}</h3>
    <h4>Es tutor de la carrera: Ing. en Sistemas Computacionales</h4>
    <h4>En el semestre: {{ Auth::user()->t_semestre }}</h4>
  </div>
</div> --}}

<div class="card-panel lime lighten-3 hoverable">
  @php
  $hoy = date('d-m-20y');
@endphp

<h5 class="right-align">{{ $hoy }}  <span class="glyphicon glyphicon-calendar"></span></h5>
     <h4 class="center-align">¡Buen día!</h4>

    <h4 class="center-align">Bienvenid@ ={{ Auth::user()->nom_docente }}=</h4>
    <h5 class="center-align">Ahora estas como tutor de proyecto</h5>
    <h5 class="center-align">De la carrera: Ing. en Sistemas Computacionales</h5>
    <h5 class="center-align">En el semestre: {{ Auth::user()->t_semestre }}</h5>
</div>


@endif
  </div>
</div>

@endsection

