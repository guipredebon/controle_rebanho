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
        // Adicionar mais configurações e eventos conforme necessário
        events: [
            // Exemplo de evento 

            {
                title: 'Secagem - Estrela',
                start: '2023-10-06',
            },
            {
                title: 'Retorno de Cio - Mimosa',
                start: '2023-10-10',
            },
            {
                title: 'Vacinação Rebanho',
                start: '2023-10-19',
            },
            {
                title: 'Cio Pós Parto - Malhada',
                start: '2023-10-25',
            },
            // Adicione mais eventos conforme necessário
        ],
        dateClick: function (info) {
            abrirModalCriacaoEvento(info.dateStr);
        }
    });

    calendar.render();

    function abrirModalCriacaoEvento(dataSelecionada ) {
        var modalEvento = new bootstrap.Modal(document.getElementById('eventoModal'));
        modalEvento.show();

        var dataInput = document.getElementById('dataInput');
        dataInput.value = dataSelecionada;
        // Ao salvar o evento no modal, adicione-o à lista de eventos no calendário
    }


    $(document).ready(function() {

        carregarOpcoesVacas();
        carregarOpcoesTipoEvento();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $("#salvarEvento").on("click", salvarEvento);

        function carregarOpcoesVacas() {
            $.get('/opcoes/vacas', function(data) {
                var vacaSelect = $('#vacaSelect');
                vacaSelect.empty();
                data.forEach(function(vaca) {
                    vacaSelect.append($('<option>', {
                        value: vaca.id,
                        text: vaca.nome
                    }));
                });
            });
        }

        function carregarOpcoesTipoEvento() {
            $.get('/opcoes/tipo-evento', function(data) {
                var tipoEventoSelect = $('#tipoEventoSelect');
                tipoEventoSelect.empty();
                data.forEach(function(tipoEvento) {
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

            $.post("/salvarEvento", evento, function(response) {
                alert("Evento salvo com sucesso!");
            });
        }
    });

});

