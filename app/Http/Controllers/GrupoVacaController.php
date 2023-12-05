<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoVacaController extends Controller
{
    public function obterGruposVacas()
    {
        $gruposVacas = Grupo::all();
        return response()->json($gruposVacas);
    }
}
