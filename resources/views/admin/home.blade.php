@extends('admin.modulos.plantilla')

@section('title', 'Home')

@section('contenido')

@if (Session::has('info'))
	<div class="alert alert-info">
		{{ Session::get('info') }}
	</div>
@endif

<div class="page-header">
  <h1>Admin Home <small>Bienvenido</small></h1>
</div>
@endsection

