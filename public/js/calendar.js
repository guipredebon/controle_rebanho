document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,list'
        },

        events: '/eventos', // Rota para obter eventos dinamicamente (getEventos AgendaController)

        dateClick: function (info) {
            abrirModalCriacaoEvento(info.dateStr);
        },

        eventContent: function (info) {
            var title = info.event.title;
            var vaca = info.event.extendedProps.vaca;
            var grupoVaca = info.event.extendedProps.grupo_vaca;
            var numeroIdentificacao = vaca ? info.event.extendedProps.nro_identificacao : null;

            var tooltipText = 'Evento: ' + title;

            if (vaca) {
                tooltipText += '<br>Nro. Identificador: ' + numeroIdentificacao +'<br>Vaca: ' + vaca;
            } else if (grupoVaca) {
                tooltipText += '<br>Grupo: ' + grupoVaca;
            }

            var content = document.createElement('div');
            content.innerHTML = tooltipText;

            var tooltip = new bootstrap.Tooltip(content, {
                trigger: 'hover',
                placement: 'top',
                container: 'body',
                html: true
            });

            return { domNodes: [content] };
        },

        eventClick: function (info) {
            // Abre o modal que mostra os detalhes do evento.
            var event = info.event;
            console.log(event);
            var modal = new bootstrap.Modal(document.getElementById('detalhesModal'));
            modal.show();

            document.getElementById('modalTitle').textContent = event.title;
            document.getElementById('modalData').innerText = event.start.toLocaleDateString('pt-BR', { year: 'numeric', month: 'numeric', day: 'numeric' });


            var vaca = event.extendedProps.vaca;
            var grupoVaca = event.extendedProps.grupo_vaca;
            var observacoes = event.extendedProps.observacoes;
            var numeroIdentificacao = event.extendedProps.nro_identificacao;

            var detalhesEvento = '';

            if (vaca) {
                detalhesEvento += 'Nro. Identificador: ' + numeroIdentificacao + '<br>Vaca: ' + vaca;
            } else if (grupoVaca) {
                detalhesEvento += 'Grupo: ' + grupoVaca + '<br>';
            }
        
            if (observacoes) {
                detalhesEvento += 'Observações: ' + observacoes + '<br>';
            }

            document.getElementById('detalhesEvento').innerHTML = detalhesEvento;

            // Obtenha referências aos botões de edição e exclusão
            var editarEventoButton = document.getElementById('editarEvento');
            var excluirEventoButton = document.getElementById('excluirEvento');

            if (editarEventoButton && excluirEventoButton) {
                editarEventoButton.addEventListener('click', function () {
                    // ação de edição do evento aqui.

                });

                excluirEventoButton.addEventListener('click', function () {
                    // ação de exclusão do evento aqui.

                });
            }
        }



    });

    calendar.render();

    function abrirModalCriacaoEvento(dataSelecionada) {
        var modalEvento = new bootstrap.Modal(document.getElementById('eventoModal'));
        modalEvento.show();

        var dataInput = document.getElementById('dataInput');
        dataInput.value = dataSelecionada;
    }


    $(document).ready(function () {

        carregarOpcoesVacas();
        carregarOpcoesGruposVacas();
        carregarOpcoesTipoEvento();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#salvarEvento").on("click", salvarEvento);

        function carregarOpcoesVacas() {
            $.get('/opcoes/vacas', function (data) {
                var vacaSelect = $('#vacaSelect');
                vacaSelect.empty();

                vacaSelect.append($('<option>', {
                    value: '',
                    text: 'Selecione'
                }));

                data.forEach(function (vaca) {
                    vacaSelect.append($('<option>', {
                        value: vaca.id,
                        text: vaca.nome
                    }));
                });
            });
        }

        function carregarOpcoesGruposVacas() {
            $.get('/opcoes/grupos-vacas', function (data) {
                var grupoVacaSelect = $('#grupoVacaSelect');
                grupoVacaSelect.empty();

                grupoVacaSelect.append($('<option>', {
                    value: '',
                    text: 'Selecione'
                }));

                data.forEach(function (grupoVaca) {
                    grupoVacaSelect.append($('<option>', {
                        value: grupoVaca.id,
                        text: grupoVaca.nome
                    }));
                });
            });
        }
        

        function carregarOpcoesTipoEvento() {
            $.get('/opcoes/tipo-evento', function (data) {
                var tipoEventoSelect = $('#tipoEventoSelect');
                tipoEventoSelect.empty();
                data.forEach(function (tipoEvento) {
                    tipoEventoSelect.append($('<option>', {
                        value: tipoEvento.id,
                        text: tipoEvento.tipo_evento
                    }));
                });
            });
        }

        function salvarEvento() {
            const vacaSelecionada = $("#vacaSelect").val();
            const grupoVacaSelecionado = $("#grupoVacaSelect").val();
        
            if ((vacaSelecionada && grupoVacaSelecionado) || (!vacaSelecionada && !grupoVacaSelecionado)) {
                alert("Selecione uma vaca ou um grupo, mas não ambos.");
                return;
            }
        
            const data = $("#dataInput").val();
            const vacaId = vacaSelecionada || null;
            const grupoVacaId = grupoVacaSelecionado || null;
            const tipoEventoId = $("#tipoEventoSelect").val();
            const observacoes = $("#observacoesTextarea").val();
        
            const evento = {
                data: data,
                vacaId: vacaId,
                grupoVacaId: grupoVacaId,
                tipoEventoId: tipoEventoId,
                observacoes: observacoes
            };
        
            $.post("/salvarEvento", evento, function (response) {
                alert("Evento salvo com sucesso!");
                var modalEvento = new bootstrap.Modal(document.getElementById('eventoModal'));
                modalEvento.hide();
                location.reload();
            });
        }        

    });

});

