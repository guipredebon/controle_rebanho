<!-- Button para abrir o modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventoModal">
    Criar Evento
  </button>
  
  <!-- Modal de Criação de Evento -->
  <div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="eventoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eventoModalLabel">Criar Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulário para criar um novo evento -->
          <form id="eventoForm">
            <div class="form-group">
              <label for="vacaSelect">Selecione a Vaca</label>
              <select class="form-control" id="vacaSelect" name="vaca_id">
                <!-- Inclua as opções para selecionar a vaca -->
              </select>
            </div>
            <div class="form-group">
              <label for="tipoEventoSelect">Selecione o Tipo de Evento</label>
              <select class="form-control" id="tipoEventoSelect" name="tipo_evento_id">
                <!-- Inclua as opções para selecionar o tipo de evento -->
              </select>
            </div>
            <div class="form-group">
              <label for="dataInput">Data</label>
              <input type="date" class="form-control" id="dataInput" name="data">
            </div>
            <div class="form-group">
              <label for="observacoesTextarea">Observações</label>
              <textarea class="form-control" id="observacoesTextarea" name="observacoes"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" id="salvarEvento">Salvar</button>
        </div>
      </div>
    </div>
  </div>
  