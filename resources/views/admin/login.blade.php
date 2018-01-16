@extends('admin.modulos.plantilla')

@section('title', 'Login Admin')

@section('contenido')

@if (Session::has('info'))
	<div class="alert alert-danger">
		{{ Session::get('info') }}
	</div>
@endif

<div class="row">

	<div class="col s6 offset-s3">

		<div class="card-panel deep-orange lighten-5">
			<h5 class="center-align">Login Administrador</h5>

	<form action="{{ route('datosLoginAdmin') }}" method="POST">
		
			{!! csrf_field() !!}
		
	{{-- 	<div class="input-field{{ $errors->has('no_docente') ? ' has-error' : ''}}">
			<label for="no_docente">Número de cuenta</label>
			<input type="text" name="no_docente" class="validate">

			@if ($errors->has('no_docente'))
			  <span class="help-block">{{ $errors->first('no_docente') }}</span>
			@endif
		</div> --}}

		<div class="input-field col s12">
			<input id="no_docente" name="no_docente" type="text" class="validate">
			<label for="no_docente">Número de cuenta</label>
		</div>

	{{-- 	<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
			<label for="password">Contraseña</label>
			<input type="password" name="password" class="form-control">
			
			@if ($errors->has('password'))
			  <span class="help-block">{{ $errors->first('password') }}</span>
			@endif
		</div> --}}

		<div class="input-field col s12">
			<input id="password" name="password" type="password" class="validate">
			<label for="password">Contraseña</label>
		</div>

		{{-- <button type="submit" class="btn btn-primary">Entrar</button> --}}

		<button class="btn waves-effect waves-light" type="submit">Entrar
			<i class="material-icons right">send</i>
		</button>
		
	</form>
		</div>
		<br>
		<p>Regresar al login principal <a href="{{ route('login') }}">Atrás</a></p>
	</div>
</div>



{{-- <div class="col-md-4 col-md-offset-4">
	<h1>Login Admin</h1>

	<form action="{{ route('datosLoginAdmin') }}" method="POST">
		
		{!! csrf_field() !!}
		
		<div class="form-group{{ $errors->has('no_docente') ? ' has-error' : ''}}">
			<label for="no_docente">Número de cuenta</label>
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

		<button type="submit" class="btn btn-primary">Entrar</button>
	</form>
<br>
	<p>Regresar al login principal <a href="{{ route('login') }}">Atrás</a></p>
</div> --}}

@endsection

