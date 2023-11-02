<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventosController extends Controller {

    public function index() {
        $eventos = Evento::all(); // Recupera todos os eventos do banco de dados.
        return view('eventos.index', ['eventos' => $eventos]);
    }
    public function create() {
        return view('eventos.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'tipo_evento' => 'required|unique:eventos,tipo_evento',
            // Adicione validações para outros campos, se necessário
        ]);

        Evento::create($validatedData);

        return redirect()->route('eventos.index')->with('success', 'Tipo de Evento criado com sucesso!');
    }


    public function update(Request $request, Evento $evento) {
        $validatedData = $request->validate([
            'tipo_evento' => 'required|in:Vacinação,Cio,Inseminação,Retorno de cio,Aborto,Secagem,Parto,Falecimento',
            // Adicione validações para outros campos, se necessário
        ]);

        $evento->update($validatedData);

        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Evento $evento) {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso!');
    }
}
