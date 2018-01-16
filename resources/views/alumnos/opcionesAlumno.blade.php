@extends('modulos.plantilla')

@section('title', 'Alumno')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<h1 class="text-center">Opciones</h1>

<a href="{{ route('elegirPlantel') }}" class="btn btn-primary btn-lg btn-block">Registrarse</a>
<br>
<br>
<a href="{{ route('elegirPlantelConsulta') }}" class="btn btn-primary btn-lg btn-block">Consultar</a>
</div>
@endsection