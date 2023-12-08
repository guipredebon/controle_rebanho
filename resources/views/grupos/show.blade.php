@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalhes do Grupo</h2>

        <p><strong>Nome do Grupo:</strong> {{ $grupo->nome }}</p>

        <h3>Vacas no Grupo:</h3>
        @if($grupo->vacas->count() > 0)
            <ul>
                @foreach($grupo->vacas as $vaca)
                    <li>{{ $vaca->nome }} - Nº Identificação: {{ $vaca->nro_identificacao }}</li>
                @endforeach
            </ul>
        @else
            <p>Nenhuma vaca no grupo.</p>
        @endif

        <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
