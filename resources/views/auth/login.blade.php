@extends('modulos.plantilla')

@section('title', 'Login')

@section('contenido')

{{-- @if (Session::has('info'))
   <div class="alert alert-danger">
   	{{ Session::get('info') }}
   </div>
   @elseif(Session::has('info2'))
   <div class="alert alert-success">
   	{{ Session::get('info2') }}
   </div>
@endif --}}

<div class="row">
	<div class="col s6 offset-s3">

	<div class="card-panel green lighten-4">
		<h3 class="center-align">Login</h3>

		<form action="{{ route('datosLogin') }}" method="POST">

			{!! csrf_field() !!}

			<div class="input-field col s12">
				<input id="no_docente" name="no_docente" type="text" class="validate">
				<label for="no_docente">Número de trabajador</label>
			</div>

			<div class="input-field col s12">
				<input id="password" name="password" type="password" class="validate">
				<label for="password">Contraseña</label>
			</div>

			<button class="btn waves-effect waves-light" type="submit">Entrar
				<i class="material-icons right">send</i>
			</button>
		</form>
		<br>
		<p>Eres admin?... <a href="{{ route('loginAdmin') }}">Entra aquí</a></p>
	</div>

	</div>
</div>

{{-- <div class="col-md-6 col-md-offset-3">
	<h1>Login</h1>

	<form action="{{ route('datosLogin') }}" method="POST">

	{!! csrf_field() !!}
		<div class="form-group{{ $errors->has('no_docente') ? ' has-error' : ''}}">
			<label for="no_docente">Número de trabajador</label>
			<input type="text" name="no_docente" class="form-control">
			@if ($errors->has('no_docente'))
			<span class="help-block">{{ $errors->first('no_docente') }}</span>
			@endif
		</div>


		<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
			<label for="password">Contraseña</label>
			<input type="password" name="password" class="form-control">
			  @if ($errors->has('password'))
			<span class="help-block">{{ $errors->first('password') }}</span>
		      @endif
		</div>

		<button type="submit" class="btn btn-primary btn-block">Entrar</button>
	</form>
	<br>
	<p>Eres admin?... <a href="{{ route('loginAdmin') }}">Entra aquí</a></p>
</div> --}}

@endsection