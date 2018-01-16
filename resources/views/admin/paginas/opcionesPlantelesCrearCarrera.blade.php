@extends('admin.modulos.plantilla')

@section('title', 'Lista Planteles')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<h1>Elegir Plantel</h1>

@if (count($planteles) == 0)
	<h4 class="orange-text text-darken-1"><i class="material-icons">info</i>No hay planteles registrados con relación al campus todavía</h4>

@else

<form action="{{ route('altaCarreras') }}" method="POST">

	{{ csrf_field() }}

	<div class="input-field col s12">
		<select name="plantel_id" onchange="this.form.submit()">
			@foreach ($planteles as $plantel)
			<option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
			@endforeach
		</select>
	</div>
</form>

@endif
	
</div>

@endsection