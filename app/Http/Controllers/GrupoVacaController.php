<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Vaca;
use Illuminate\Http\Request;

class GrupoVacaController extends Controller {

    public function index() {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }

    public function show($id) {
        $grupo = Grupo::findOrFail($id);
        return view('grupos.show', compact('grupo'));
    }

    public function create() {
        $vacas = Vaca::all();
        return view('grupos.create', compact('vacas'));
    }

    public function store(Request $request) {
        $vacasSelecionadas = $request->input('vacas');
        $request->validate([
            'nomeGrupo' => 'required|string|max:255',
        ]);

        try {
            $nomeGrupo = $request->input('nomeGrupo');
            $novoGrupo = Grupo::create([
                'nome' => $nomeGrupo,
            ]);

            if (!empty($vacasSelecionadas)) {
                $novoGrupo->vacas()->attach($vacasSelecionadas);
            }

            return redirect()->route('grupos.index')->with('success', 'Grupo criado com sucesso!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar grupo. Por favor, tente novamente.'], 500);
        }
    }

    public function edit($id) {
        $grupo = Grupo::findOrFail($id);
        $vacas = Vaca::all();
        return view('grupos.edit', compact('grupo', 'vacas'));
    }

    public function update(Request $request, $id) {
        $vacasSelecionadas = $request->input('vacas');
        $request->validate([
            'nomeGrupo' => 'required|string|max:255',
        ]);

        try {
            $grupo = Grupo::findOrFail($id);
            $grupo->update([
                'nome' => $request->input('nomeGrupo'),
            ]);

            $grupo->vacas()->sync($vacasSelecionadas);

            return redirect()->route('grupos.index')->with('success', 'Grupo atualizado com sucesso!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar grupo. Por favor, tente novamente.'], 500);
        }
    }

    public function destroy($id) {
        try {
            $grupo = Grupo::findOrFail($id);
            $grupo->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao excluir grupo. Por favor, tente novamente.'], 500);
        }
    }


    public function obterGruposVacas() {
        $gruposVacas = Grupo::all();
        return response()->json($gruposVacas);
    }
}
