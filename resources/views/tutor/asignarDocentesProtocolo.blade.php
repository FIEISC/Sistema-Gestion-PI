@extends('tutor.modulos.plantilla')

@section('title', 'Asignar Docentes')

@section('contenido')

@if (Session::has('info'))
  <div class="alert alert-success">
    {{ Session::get('info') }}
  </div>

@elseif(Session::has('info2'))

<div class="alert alert-success">
  {{ Session::get('info2') }}
</div>
@endif


<div class="col-md-12 col-md-offset-0">
  <div class="card-panel green lighten-4">
    <h5 class="center-align">Asignar Docentes</h5>
    <br>
    @if (count($protocolos) === 0)
       <h5 class="center-align blue-text">No hay protocolos creados todavía</h5>

    @else
    <table class="bordered highlight centered responsive-table">
    
    <thead>
      <tr>
          <th class="text-center">Protocolo</th>
          <th class="text-center">Docentes</th>
          <th class="text-center">Acciones</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($protocolos as $protocolo)
          <tr>
            <td>{{ $protocolo->nom_protocolo }}</td>
            <td>
          @foreach ($protocolo->manyUsers as $user)
                <ul>
                  <li>{{ $user->nom_docente }}</li>
                </ul>
          @endforeach
            </td>
            <td>

              <a href="{{ route('asignarDocentesProtocoloForm', $protocolo->id) }}" class="waves-effect waves-light green btn tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar"><i class="material-icons">check</i></a>

               <a href="{{ route('editarDocentesProtocoloForm', $protocolo->id) }}" class="waves-effect waves-light orange btn tooltipped" data-position="top" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>

            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
    @endif

  </div>
</div>
@endsection

