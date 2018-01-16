@extends('modulos.plantilla')

@section('title', 'Registro')

@section('contenido')

<div class="row">
	<div class="col s6 offset-s3">
	<h3>Registro</h3>

	<form action="{{ route('datosRegistro') }}" method="POST">

		{!! csrf_field() !!}
		
	{{-- 	<div class="form-group{{ $errors->has('nom_docente') ? ' has-error' : '' }}">
			<label for="nom_docente">Nombre Completo</label>
			<input type="text" name="nom_docente" class="form-control" value="{{ old('nom_docente')}}">

			@if ($errors->has('nom_docente'))
				<span class="help-block">{{ $errors->first('nom_docente') }}</span>
			@endif
		</div> --}}

		<div class="row">
			<div class="input-field col s12{{ $errors->has('no_docente') ? ' has-error' : '' }}">
			<input id="nom_docente" name="nom_docente" type="text" class="validate">
			<label for="nom_docente">Nombre Completo</label>
			</div>

			@if ($errors->has('no_docente'))
				<span class="help-block">{{ $errors->first('no_docente') }}</span>
			@endif
		</div>

		{{-- <div class="form-group{{ $errors->has('no_docente') ? ' has-error' : '' }}">
			<label for="no_docente">Número de trabajador</label>
			<input type="text" name="no_docente" class="form-control" value="{{ old('no_docente')}}">

			@if ($errors->has('no_docente'))
				<span class="help-block">{{ $errors->first('no_docente') }}</span>
			@endif
		</div> --}}

		<div class="row">
			<div class="input-field col s12">
			<input id="no_docente" name="no_docente" type="text" class="validate">
			<label for="no_docente">Número de trabajador</label>
			</div>
		</div>

		{{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email">Correo Electrónico Universitario</label>
			<input type="email" name="email" class="form-control" value="{{ old('email')}}">

			@if ($errors->has('email'))
				<span class="help-block">{{ $errors->first('email') }}</span>
			@endif
		</div> --}}

		<div class="row">
			<div class="input-field col s12">
			<input id="email" name="email" type="email" class="validate">
			<label for="email">Correo Universitario</label>
			</div>
		</div>

		{{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label for="password">Contraseña</label>
			<input type="password" name="password" class="form-control">

			@if ($errors->has('password'))
				<span class="help-block">{{ $errors->first('password') }}</span>
			@endif
		</div>
 --}}

 	<div class="row">
			<div class="input-field col s12">
			<input id="password" name="password" type="password" class="validate">
			<label for="password">Contraseña</label>
			</div>
		</div>

	{{-- 	<div class="form-group">
			<label for="plantel">Plantel</label>
			<select name="plantel_id" id="plantel" class="form-control">
				@foreach ($planteles as $plantel)
					<option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
				@endforeach
			</select>
		</div>
 --}}

        <div class="input-field col s12">
        <select name="plantel_id">
        		@foreach ($planteles as $plantel)
        		<option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
        		@endforeach
        	</select>
        	<label>Elegir plantel</label>
        </div>

		<button type="submit" class="btn btn-primary btn-block">Registrarse</button>
	</form>
</div>
</div>

@endsection