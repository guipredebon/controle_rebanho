@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listagem de Vacas</h2>
    <a href="{{ route('vacas.create') }}" class="btn btn-primary">Nova Vaca</a>
    <button id="criarGrupoBtn" class="btn btn-success" disabled>Adicionar ao Grupo</button>


    <table class="table">
        <thead>
            <tr>
                <th></th>
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
                <td>
                    <input type="checkbox" class="selecionarVaca" data-id="{{ $vaca->id }}">
                </td>
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

<!-- Modal para Informar Nome do Grupo -->
<div class="modal fade" id="criarGrupoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Criar Grupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="criarGrupoForm">
                    <div class="form-group">
                        <label for="nomeGrupo">Nome do Grupo:</label>
                        <input type="text" class="form-control" id="nomeGrupo" name="nomeGrupo">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="salvarGrupoBtn">Salvar</button>
            </div>
        </div>
    </div>
</div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selecionarVacaCheckboxes = document.querySelectorAll('.selecionarVaca');
        const criarGrupoBtn = document.getElementById('criarGrupoBtn');
        const criarGrupoModal = new bootstrap.Modal(document.getElementById('criarGrupoModal'));

        let vacasSelecionadas = [];

        selecionarVacaCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function () {
                const vacaId = parseInt(this.getAttribute('data-id'));

                if (this.checked) {
                    vacasSelecionadas.push(vacaId);
                } else {
                    vacasSelecionadas = vacasSelecionadas.filter((id) => id !== vacaId);
                }

                criarGrupoBtn.disabled = vacasSelecionadas.length === 0;
            });
        });

        criarGrupoBtn.addEventListener('click', function () {
            criarGrupoModal.show();
            document.getElementById('nomeGrupo').value = '';
        });

        document.getElementById('salvarGrupoBtn').addEventListener('click', function () {
            const nomeGrupo = document.getElementById('nomeGrupo').value;

            const selecionarVacaCheckboxes = document.querySelectorAll('.selecionarVaca');
            const vacasSelecionadas = Array.from(selecionarVacaCheckboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.getAttribute('data-id'));

            console.log('Vacas Selecionadas:', vacasSelecionadas);
            console.log('Nome do Grupo:', nomeGrupo);

            // Limpa as vacas selecionadas após o salvar
            selecionarVacaCheckboxes.forEach((checkbox) => {
                checkbox.checked = false;
            });

            document.getElementById('nomeGrupo').value = '';

            criarGrupoBtn.disabled = true;
            criarGrupoModal.hide();

            console.log('Corpo da Requisição:', JSON.stringify({ vacas: vacasSelecionadas.map(Number), nomeGrupo }));

            fetch('/grupos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ vacas: vacasSelecionadas.map(Number), nomeGrupo }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Resposta do Servidor:', data);
                if (data.success) {
                    alert('Grupo criado com sucesso!');
                }
            })
            .catch(error => {
                console.error('Erro ao enviar dados para o servidor:', error);
            });
        });
    });
</script>


@endsection
