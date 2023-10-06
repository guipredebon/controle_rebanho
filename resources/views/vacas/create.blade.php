@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Criar Nova Vaca</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('vacas.store') }}">
                            @csrf

                            <!-- Campo para o nome -->
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>

                            <!-- Campo para o número de identificação -->
                            <div class="form-group">
                                <label for="nro_identificacao">Nº. Identificação:</label>
                                <input type="text" name="nro_identificacao" id="nro_identificacao" class="form-control" required>
                            </div>

                            <!-- Campo para a data de nascimento -->
                            <div class="form-group">
                                <label for="data_nascimento">Data de Nascimento:</label>
                                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
                            </div>

                            <!-- Campo para a raça -->
                            <div class="form-group">
                                <label for="raca">Raça:</label>
                                <input type="text" name="raca" id="raca" class="form-control" required>
                            </div>

                            <!-- Botão de envio -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Criar Vaca</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
