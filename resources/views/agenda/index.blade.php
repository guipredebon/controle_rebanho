@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agenda</h2>
    <div id="calendar"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/locales/pt-br.js"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css" rel="stylesheet">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'pt-br',
            initialView: 'dayGridMonth',
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
</script>
@endsection