@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tipos de Eventos</h2>

    <a href="{{ route('tipos_evento.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Adicionar Tipo de Evento
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiposEvento as $tipoEvento)
            <tr>
                <td>{{ $tipoEvento->tipo_evento }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal-{{ $tipoEvento->id }}" data-evento="{{ json_encode($tipoEvento) }}">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <form action="{{ route('tipos_evento.destroy', $tipoEvento->id) }}" method="POST" class="d-inline" data-evento-form="{{ $tipoEvento->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $tipoEvento->id }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de edição (um para cada evento) -->
@foreach($tiposEvento as $tipoEvento)
<div class="modal fade" id="editModal-{{ $tipoEvento->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $tipoEvento->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel-{{ $tipoEvento->id }}">Editar Tipo de Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tipos_evento.update', $tipoEvento->id) }}" method="POST" id="editForm-{{ $tipoEvento->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tipo_evento">Nome do Tipo de Evento</label>
                        <input type="text" class="form-control" id="tipo_evento-{{ $tipoEvento->id }}" name="tipo_evento" value="{{ $tipoEvento->tipo_evento }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="{{ asset('js/tipos_evento.js') }}"></script>
@endsection
