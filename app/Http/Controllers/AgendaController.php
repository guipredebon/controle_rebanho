<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class AgendaController extends Controller {

    public function index() {
        return view('agenda.index');
    }

    public function salvarEvento(Request $request) {
        $request->validate([
            'data' => 'required|date',
            'vacaId' => 'required|integer',
            'tipoEventoId' => 'required|integer',
            'observacoes' => 'nullable|string',
        ]);

        $evento = new Evento;
        $evento->data = $request->input('data');
        $evento->animal_id = $request->input('vacaId');
        $evento->tipo_evento_id = $request->input('tipoEventoId');
        $evento->observacoes = $request->input('observacoes');

        $evento->save();

        return response()->json(['message' => 'Evento salvo com sucesso']);
    }
}

