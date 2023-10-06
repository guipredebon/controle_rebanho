@extends('layouts.app') <!-- Certifique-se de que o arquivo de layout seja o correto -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Vaca</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('vacas.update', $vaca->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Campo para o nome -->
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="{{ $vaca->nome }}" required>
                            </div>

                            <!-- Campo para o número de identificação -->
                            <div class="form-group">
                                <label for="nro_identificacao">Nº. Identificação:</label>
                                <input type="text" name="nro_identificacao" id="nro_identificacao" class="form-control" value="{{ $vaca->nro_identificacao }}"required>
                            </div>
                            <!-- Campo para a data de nascimento -->
                            <div class="form-group">
                                <label for="data_nascimento">Data de Nascimento:</label>
                                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ $vaca->data_nascimento }}" required>
                            </div>

                            <!-- Campo para a raça -->
                            <div class="form-group">
                                <label for="raca">Raça:</label>
                                <input type="text" name="raca" id="raca" class="form-control" value="{{ $vaca->raca }}" required>
                            </div>

                            <!-- Botão de envio -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
