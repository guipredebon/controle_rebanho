@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Modal para detalhes da Vaca -->
    <div class="modal fade" id="detalhesModal{{ $vaca->id }}" tabindex="-1" role="dialog" aria-labelledby="detalhesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalhesModalLabel">Detalhes da Vaca</h5>
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

    <!-- Restante do conteúdo da página -->
</div>
@endsection
