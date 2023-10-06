<?php

namespace App\Http\Controllers;

use App\Models\Vaca;
use Illuminate\Http\Request;

class VacasController extends Controller {

    // Cria um método que lista todas as Vacas do banco de dados.

    public function index() {
        $vacas = Vaca::all(); // Recupera todas as vacas do banco de dados.
        return view('vacas.index', ['vacas' => $vacas]);
    }

    // Exibe um formulário para criar um novo registro

    public function create() {
        return view('vacas.create');
    }


    // Cria uma nova instância de "Vaca"

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

    //Exibe os detalhes de um registro específico

    public function show($id) {
        $vaca = Vaca::find($id);

        if (!$vaca) {
            // Lida com o caso em que a Vaca não é encontrada
            return redirect()->route('vacas.index')->with('error', 'Vaca não encontrada.');
        }

        return view('vacas.show', compact('vaca'));
    }


    //Exibe um formulário pré-preenchido para editar um registro existente

    public function edit($id) {
        $vaca = Vaca::find($id);

        if (!$vaca) {
            // Lida com o caso em que a Vaca não é encontrada
            return redirect()->route('vacas.index')->with('error', 'Vaca não encontrada.');
        }

        return view('vacas.edit', compact('vaca'));
    }


    // Atualiza os dados de uma vaca existente com base em seu ID.
     
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


    // Remove uma vaca com base em seu ID.

    public function destroy(Vaca $vaca) {
        $vaca->delete();
        return redirect('/vacas');
    }
}
