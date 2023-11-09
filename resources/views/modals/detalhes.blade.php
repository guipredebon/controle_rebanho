<!-- Modal para exibir detalhes do evento -->
<div class="modal fade" id="detalhesModal" tabindex="-1" aria-labelledby="detalhesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Data: <span id="modalData"></span></p>
                <!-- Outras informações do evento podem ser exibidas aqui. -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editarEvento">
                    <i class="fa fa-pencil"></i> Editar
                </button>
                <button type="button" class="btn btn-success" id="salvarEdicaoEvento" style="display: none;">
                    <i class="fa fa-check"></i> Salvar
                </button>
            </div>
            
        </div>
    </div>
</div>
