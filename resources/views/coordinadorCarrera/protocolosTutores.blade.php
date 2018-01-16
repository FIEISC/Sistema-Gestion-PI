@extends('coordinadorCarrera.modulos.plantilla')

@section('title', 'Protocolos')

@section('contenido')

<div class="row">
    <div class="col s10 offset-s1">
    <div class="card-panel green lighten-4">
        <h5>Protocolos de los tutores asignados</h5>
    
    <table class="bordered highlight centered responsive-table">
        <thead>
            <tr>
                <th>Protocolo</th>
                <th>Creador</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($protocolos as $protocolo)
                @if (Auth::user()->c_carr == $protocolo->user->t_proy)
                <tr>

                    <td>{{ $protocolo->nom_protocolo }}</td>
                    <td>{{ $protocolo->user->nom_docente }}</td>
                    <td>
                    {{-- <a href="{{ route('verProtocolocc', $protocolo->id) }}" class="btn btn-info btn-xs">Ver <span class="glyphicon glyphicon-eye-open"></span></a> --}}

                    <a href="{{ route('verProtocolocc', $protocolo->id) }}" class="waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Ver Protocolo"><i class="material-icons">visibility</i></a>
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




































































