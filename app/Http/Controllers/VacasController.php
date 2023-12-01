<?php

namespace App\Http\Controllers;

use App\Models\Vaca;
use Illuminate\Http\Request;

class VacasController extends Controller {

    public function index() {
        $vacas = Vaca::all(); 
        return view('vacas.index', ['vacas' => $vacas]);
    }

    public function create() {
        return view('vacas.create');
    }

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

    public function show($id) {
        $vaca = Vaca::find($id);

        if (!$vaca) {
            return redirect()->route('vacas.index')->with('error', 'Vaca não encontrada.');
        }

        return view('vacas.show', compact('vaca'));
    }

    public function edit($id) {
        $vaca = Vaca::find($id);

        if (!$vaca) {
            return redirect()->route('vacas.index')->with('error', 'Vaca não encontrada.');
        }

        return view('vacas.edit', compact('vaca'));
    }

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

        return redirect('/vacas');
    }


    // Remove uma Vaca com base em seu ID.
    public function destroy(Vaca $vaca) {
        $vaca->delete();
        return redirect('/vacas');
    }
}
