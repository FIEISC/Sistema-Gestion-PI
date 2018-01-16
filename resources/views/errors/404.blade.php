@extends('modulos.plantilla')

@section('title', 'Login')

@section('contenido')

@if (Auth::guest())
	<h1>Ups! página no encontrada</h1>

<h5>Vuelve a la página <a href="{{ route('login') }}">principal</a></h5>
@endif

@endsection