@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listagem de Grupos</h2>
    <a href="{{ route('grupos.create') }}" class="btn btn-primary">Novo Grupo</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Vacas no Grupo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->nome }}</td>
                    <td>
                        @foreach ($grupo->vacas as $vaca)
                            {{ $vaca->nome }}@if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('grupos.show', $grupo->id) }}" class="btn btn-info">Detalhes</a>
                        <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" style="display: inline;">
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
@endsection
