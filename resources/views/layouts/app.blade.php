<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Aplicação</title>
    <!-- Inclua os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css' rel='stylesheet' />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">AgroCiclo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <li>
                        <a class="nav-link" href="/agenda">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vacas">Vacas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/relatorios">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/empresa">Empresa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/locales/pt-br.js'></script>
</body>
</html>