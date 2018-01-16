@extends('modulos.plantilla')

@section('title', 'Registro')

@section('contenido')

<div class="col-md-6 col-md-offset-3">
	<h1>Consultar</h1>

<form action="{{ route('datosInfoAlumno') }}" method="POST">

    {!! csrf_field() !!}

    @if ($ciclo->ciclo == 1)
     {{--  <div class="form-group">
      <label for="semestre">Semestre</label>
      <select name="semestre" id="semestre" class="form-control">
        <option value="1">1</option>
        <option value="3">3</option>
        <option value="5">5</option>
      </select>
    </div> --}}

    <div class="input-field col s12">
      <select name="semestre">
        <option value="1">1</option>
        <option value="3">3</option>
        <option value="5">5</option>
      </select>
      <label>Elegir semestre</label>
    </div>

    @elseif($ciclo->ciclo == 2)
  {{--    <div class="form-group">
      <label for="semestre">Semestre</label>
      <select name="semestre" id="semestre" class="form-control">
        <option value="2">2</option>
        <option value="4">4</option>
        <option value="6">6</option>
      </select>
    </div> --}}

    <div class="input-field col s12">
      <select name="semestre">
       <option value="2">2</option>
        <option value="4">4</option>
        <option value="6">6</option>
      </select>
      <label>Elegir semestre</label>
    </div>

    @endif

    {{-- <div class="form-group">
      <label for="carrera">Carrera</label>
      <select name="carrera" id="carrera" class="form-control">
        @foreach ($carreras as $carrera)
          <option value="{{ $carrera->id }}">{{ $carrera->nom_carrera }}</option>
        @endforeach
      </select>
    </div> --}}

    <div class="input-field col s12">
      <select name="carrera">
       @foreach ($carreras as $carrera)
          <option value="{{ $carrera->id }}">{{ $carrera->nom_carrera }}</option>
        @endforeach
      </select>
      <label>Elegir Carrera</label>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Buscar</button>
  </form>
</div>
</div>
@endsection


































