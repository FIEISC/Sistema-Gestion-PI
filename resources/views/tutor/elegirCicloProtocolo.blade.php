@extends('tutor.modulos.plantilla')

@section('title', 'Elegir Ciclo')

@section('contenido')

<div class="row">
  <div class="col s6 offset-s3">

  <div class="card-panel green lighten-4">

    <h5 class="center-align">Elegir Ciclo</h5>

  <table class="bordered highlight centered responsive-table"> 
    <thead>
      <tr>
        <th>Ciclo</th>
        <th>Acción</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($ciclos as $ciclo)
        @if ($ciclo->activo == 1)
          <tr>
            <td>{{ $ciclo->nom_ciclo }}</td>

            <td>
            {{-- <a href="{{ route('crearProtocolo', $ciclo->id) }}" class="btn btn-primary btn-xs">Crear Protocolo</a> --}}

            <a href="{{ route('crearProtocolo', $ciclo->id) }}" class="waves-effect waves-light green btn tooltipped" data-position="right" data-delay="50" data-tooltip="Crear Protocolo"><i class="material-icons">create</i></a>
            </td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
@endsection

