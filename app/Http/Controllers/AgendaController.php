<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class AgendaController extends Controller {

    public function index() {
        return view('agenda.index');
    }

    public function getEventos() {
        try {
            $eventos = Evento::with('tipo_evento', 'vacas')->get();
    
            $formattedEvents = [];
            foreach ($eventos as $evento) {
                $formattedEvents[] = [
                    'title' => $evento->tipo_evento->tipo_evento, 
                    'start' => $evento->data,
                    'extendedProps' => [
                        'vaca' => $evento->vacas->nome,
                        'nro_identificacao' => $evento->vacas->nro_identificacao
                    ]
                ];
            }
    
            return response()->json($formattedEvents);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Retorna um erro detalhado em formato JSON
        }
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
