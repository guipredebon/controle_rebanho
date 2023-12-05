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
            $eventos = Evento::with('tipo_evento', 'vacas', 'grupo_vaca')->get();
    
            $formattedEvents = [];
            foreach ($eventos as $evento) {
                if ($evento->vacas) {
                    $vacaNome = $evento->vacas->nome;
                } elseif ($evento->grupo_vaca) {
                    $grupoVacaNome = $evento->grupo_vaca->nome;
                }


                if ($evento->vacas) {
                    $formattedEvents[] = [
                        'title' => $evento->tipo_evento->tipo_evento, 
                        'start' => $evento->data,
                        'extendedProps' => [
                            'vaca' => $vacaNome,
                            'nro_identificacao' => $evento->vacas->nro_identificacao,
                            'observacoes' => $evento->observacoes
                        ]
                    ];
                } elseif ($evento->grupo_vaca) {
                    $formattedEvents[] = [
                        'title' => $evento->tipo_evento->tipo_evento, 
                        'start' => $evento->data,
                        'extendedProps' => [
                            'grupo_vaca' => $grupoVacaNome,
                            'observacoes' => $evento->observacoes
                        ]
                    ];
                }
            }
    
            return response()->json($formattedEvents);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Retorna um erro detalhado em formato JSON
        }
    }
    
    public function salvarEvento(Request $request) {
        $request->validate([
            'data' => 'required|date',
            'tipoEventoId' => 'required|integer',
            'observacoes' => 'nullable|string',
        ]);
    
        $vacaId = $request->input('vacaId');
        $grupoVacaId = $request->input('grupoVacaId');
    
        if (!$vacaId && !$grupoVacaId) {
            return response()->json(['error' => 'Forneça vacaId ou grupoVacaId.'], 400);
        }
    
        $evento = new Evento;
        $evento->data = $request->input('data');
        $evento->tipo_evento_id = $request->input('tipoEventoId');
        $evento->observacoes = $request->input('observacoes');
    
        if ($vacaId) {
            $evento->animal_id = $vacaId;
            $evento->grupo_vaca_id = null;
        } elseif ($grupoVacaId) {
            $evento->grupo_vaca_id = $grupoVacaId;
            $evento->animal_id = null;
        }
    
        $evento->save();
    
        return response()->json(['message' => 'Evento salvo com sucesso']);
    }
    
}
