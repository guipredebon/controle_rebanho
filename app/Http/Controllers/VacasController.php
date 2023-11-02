<?php

namespace App\Http\Controllers;

use App\Models\Vaca;
use Illuminate\Http\Request;

class VacasController extends Controller {

    // Lista todas as Vacas do banco de dados e exibe em uma view.
    public function index() {
        $vacas = Vaca::all(); // Recupera todas as vacas do banco de dados.
        return view('vacas.index', ['vacas' => $vacas]);
    }

    // Exibe um formulário para criar uma nova vaca.
    public function create() {
        return view('vacas.create');
    }


    //  Lida com a criação de uma nova Vaca com base nos dados enviados do formulário.
    public function store(Request $request) {
        $validatedData = $request->validate([
            'nro_identificacao' => 'required',
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'raca' => 'required',
        ]);
    
        Vaca::create($validatedData);

        return redirect()->route('vacas.index')->with('success', 'Vaca criada com sucesso!');
    }

    // Exibe os detalhes de uma Vaca específica.
    public function show($id) {
        $vaca = Vaca::find($id);

        if (!$vaca) {
            // Lida com o caso em que a Vaca não é encontrada
            return redirect()->route('vacas.index')->with('error', 'Vaca não encontrada.');
        }

        return view('vacas.show', compact('vaca'));
    }


    // Exibe um formulário pré-preenchido para editar uma Vaca existente.
    public function edit($id) {
        $vaca = Vaca::find($id);

        if (!$vaca) {
            // Lida com o caso em que a Vaca não é encontrada
            return redirect()->route('vacas.index')->with('error', 'Vaca não encontrada.');
        }

        return view('vacas.edit', compact('vaca'));
    }

    //  Lida com a atualização dos dados de uma Vaca existente com base no ID e nos dados enviados do formulário.
    public function update(Request $request, Vaca $vaca) {
        $request->validate([
            'nro_identificacao' => 'required',
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'raca' => 'required',
        ]);

        $vaca->update([
            'nro_identificacao' => $request->input('nro_identificacao'),
            'nome' => $request->input('nome'),
            'data_nascimento' => $request->input('data_nascimento'),
            'raca' => $request->input('raca'),
        ]);

        // Redireciona para a página de exibição da Vaca atualizada
        return redirect('/vacas/' . $vaca->id);
    }


    // Remove uma Vaca com base em seu ID.
    public function destroy(Vaca $vaca) {
        $vaca->delete();
        return redirect('/vacas');
    }
}
