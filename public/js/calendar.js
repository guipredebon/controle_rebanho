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
    });

    calendar.render();
});

