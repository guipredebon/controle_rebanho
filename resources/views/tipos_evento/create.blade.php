@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Criar Tipo de Evento</h2>
        <form action="{{ route('tipos_evento.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="tipo_evento">Tipo de Evento:</label>
                <input type="text" name="tipo_evento" class="form-control" id="tipo_evento">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Tipo de Evento</button>
        </form>
    </div>
@endsection