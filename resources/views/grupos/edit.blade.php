@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Grupo</h2>

        <form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nomeGrupo">Nome do Grupo:</label>
                <input type="text" class="form-control" id="nomeGrupo" name="nomeGrupo" value="{{ $grupo->nome }}" required>
            </div>

            <div class="form-group">
                <label for="vacas">Vacas no Grupo:</label>
                <select multiple class="form-control" id="vacas" name="vacas[]">
                    @foreach ($vacas as $vaca)
                        <option value="{{ $vaca->id }}" @if(in_array($vaca->id, $grupo->vacas->pluck('id')->toArray())) selected @endif>{{ $vaca->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>

        </form>
    </div>
@endsection
