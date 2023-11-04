@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tipos de Eventos</h2>

    <a href="{{ route('eventos.create') }}" class="btn btn-primary mb-3">
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
            @foreach($eventos as $evento)
            <tr>
                <td>{{ $evento->tipo_evento }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal-{{ $evento->id }}" data-evento="{{ json_encode($evento) }}">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="d-inline" data-evento-form="{{ $evento->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $evento->id }})">
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
@foreach($eventos as $evento)
<div class="modal fade" id="editModal-{{ $evento->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $evento->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel-{{ $evento->id }}">Editar Tipo de Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('eventos.update', $evento->id) }}" method="POST" id="editForm-{{ $evento->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tipo_evento">Nome do Tipo de Evento</label>
                        <input type="text" class="form-control" id="tipo_evento-{{ $evento->id }}" name="tipo_evento" value="{{ $evento->tipo_evento }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="{{ asset('js/eventos.js') }}"></script>
@endsection
