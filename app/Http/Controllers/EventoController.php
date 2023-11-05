<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaca;
use App\Models\TipoEvento;

class EventoController extends Controller
{
    public function opcoesVacas()
    {
        $vacas = Vaca::all();
        return response()->json($vacas);
    }

    public function opcoesTipoEvento()
    {
        $tiposEvento = TipoEvento::all();
        return response()->json($tiposEvento);
    }
}
