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
                    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
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

<script src="{{ asset('js/eventos.js') }}"></script>
@endsection