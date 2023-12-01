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
            var tooltipText = 'Evento: ' + title + '<br>Vaca: ' + vaca;

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
            var modal = new bootstrap.Modal(document.getElementById('detalhesModal'));
            modal.show();

            document.getElementById('modalTitle').textContentText = event.title;
            document.getElementById('modalData').innerText = event.start.toLocaleString();


            // Obtenha referências aos botões de edição e exclusão
            var editarEventoButton = document.getElementById('editarEvento');
            var excluirEventoButton = document.getElementById('excluirEvento');

            if (editarEventoButton && excluirEventoButton) {
                editarEventoButton.addEventListener('click', function () {
                    // Lidar com a ação de edição do evento aqui.

                });

                excluirEventoButton.addEventListener('click', function () {
                    // Lidar com a ação de exclusão do evento aqui.

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
        // Ao salvar o evento no modal, adicione-o à lista de eventos no calendário
    }


    $(document).ready(function () {

        carregarOpcoesVacas();
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
                data.forEach(function (vaca) {
                    vacaSelect.append($('<option>', {
                        value: vaca.id,
                        text: vaca.nome
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
            const data = $("#dataInput").val();
            const vacaId = $("#vacaSelect").val();
            const tipoEventoId = $("#tipoEventoSelect").val();
            const observacoes = $("#observacoesTextarea").val();

            const evento = {
                data: data,
                vacaId: vacaId,
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

