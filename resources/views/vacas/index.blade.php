@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listagem de Vacas</h2>
    <a href="{{ route('vacas.create') }}" class="btn btn-primary">Nova Vaca</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Identificação</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Raça</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vacas as $vaca)
            <tr>
                <td>{{ $vaca->id }}</td>
                <td>{{ $vaca->nro_identificacao }}</td>
                <td>{{ $vaca->nome }}</td>
                <td>{{ $vaca->data_nascimento }}</td>
                <td>{{ $vaca->raca }}</td>
                <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#detalhesModal{{ $vaca->id }}">Detalhes</a>
                    <a href="{{ route('vacas.edit', $vaca->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('vacas.destroy', $vaca->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal para Detalhes da Vaca -->
@foreach ($vacas as $vaca)
<div class="modal fade" id="detalhesModal{{ $vaca->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes da Vaca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nome:</strong> {{ $vaca->nome }}</p>
                <p><strong>Nº. Identificação:</strong> {{ $vaca->nro_identificacao }}</p>
                <p><strong>Data de Nascimento:</strong> {{ $vaca->data_nascimento }}</p>
                <p><strong>Raça:</strong> {{ $vaca->raca }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
