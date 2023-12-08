@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Criar Novo Grupo</h2>

        <form action="{{ route('grupos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nomeGrupo">Nome do Grupo:</label>
                <input type="text" class="form-control" id="nomeGrupo" name="nomeGrupo" required>
            </div>

            <div class="form-group">
                <label>Vacas no Grupo:</label>
                <div class="form-check">
                    @foreach ($vacas as $vaca)
                        <input class="form-check-input" type="checkbox" id="vaca{{ $vaca->id }}" name="vacas[]" value="{{ $vaca->id }}">
                        <label class="form-check-label" for="vaca{{ $vaca->id }}">{{ $vaca->nome }}</label><br>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
