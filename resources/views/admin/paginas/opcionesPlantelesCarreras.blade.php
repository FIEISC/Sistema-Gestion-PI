@extends('admin.modulos.plantilla')

@section('title', 'Lista Planteles')

@section('contenido')

<div class="col-md-6 col-md-offset-3">

<h3>Elegir Planteles</h3>

<form action="{{ route('verCarreras') }}" method="POST">
	{{ csrf_field() }}

	<div class="input-field col s12">
		<select name="plantel_id" onchange="this.form.submit()">
			@foreach ($planteles as $plantel)
			<option value="{{ $plantel->id }}">{{ $plantel->nom_plantel }}</option>
			@endforeach
		</select>
	</div>
</form>
	
</div>

@endsection