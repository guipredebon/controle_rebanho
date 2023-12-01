<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller {

    public function index() {
        $tiposEvento = TipoEvento::all();
        return view('tipos_evento.index', ['tiposEvento' => $tiposEvento]);
    }
    public function create() {
        return view('tipos_evento.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'tipo_evento' => 'required|unique:tipo_evento,tipo_evento',
        ]);

        TipoEvento::create($validatedData);

        return redirect()->route('tipos_evento.index')->with('success', 'Tipo de Evento criado com sucesso!');
    }


    public function update(Request $request, TipoEvento $tipoEvento) {
        $validatedData = $request->validate([
            'tipo_evento' => 'required|unique:tipo_evento,tipo_evento',
        ]);

        $tipoEvento->update($validatedData);

        return redirect()->route('tipos_evento.index')->with('success', 'Tipo de evento atualizado com sucesso!');
    }

    public function destroy(TipoEvento $tipoEvento) {
        $tipoEvento->delete();
        return redirect()->route('tipos_evento.index')->with('success', 'Tipo de evento excluído com sucesso!');
    }
}
