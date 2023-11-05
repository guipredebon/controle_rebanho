@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Agenda</h2>
        <div id="calendar"></div>

        @include('modals.modal_evento')
    </div>

    <script src="{{ asset('js/calendar.js') }}"></script>
@endsection