@extends('tutor.modulos.plantilla')

@section('title', 'Crear Mensaje')

@section('contenido')

<div class="row">

	<div class="col s8 offset-s2">
		<div class="card-panel green lighten-4">

			<h5>Enviar mensaje</h5>

				<form action="{{ route('datosMensaje') }}" method="POST">

				{!! csrf_field() !!}

				<div class="row">
						<div class="input-field col s12">
						<select name="rx_user">
							<option value="" disabled selected>Elegir docente</option>
							@foreach ($protocolos as $protocolo)
							  @if ($protocolo->user_id == Auth::user()->id) 
							     @foreach ($protocolo->manyUsers as $docente)
							     @if ($docente->id != Auth::user()->id)
							     		<option value="{{ $docente->id }}">{{ $docente->nom_docente }}</option>
							     	@endif	
							      @endforeach
							   @endif
							@endforeach
						</select>
						<label>Elige un docente</label>
					</div>
				</div>

					<div class="row">
						<div class="input-field col s12">
						<input id="asunto" type="text" name="asunto" class="validate">
						<label for="asunto">Asunto</label>
					</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<textarea id="mensaje" name="mensaje" class="materialize-textarea"></textarea>
							<label for="mensaje">Mensaje</label>
						</div>
					</div>

					<button class="btn waves-effect waves-light" type="submit">Enviar
						<i class="material-icons right">send</i>
					</button>
				</form>
		</div>
	</div>
</div>

@endsection

