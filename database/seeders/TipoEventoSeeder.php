<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoEvento;

class TipoEventoSeeder extends Seeder
{
    public function run()
    {
        $tipos = ['Vacinação', 'Cio', 'Inseminação', 'Retorno de cio', 'Aborto', 'Secagem', 'Parto', 'Falecimento'];

        foreach ($tipos as $tipo) {
            TipoEvento::create([
                'tipo_evento' => $tipo
            ]);
        }
    }
}

