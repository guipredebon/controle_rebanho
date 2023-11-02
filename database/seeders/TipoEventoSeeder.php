<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class TipoEventoSeeder extends Seeder
{
    public function run()
    {
        $tipos = ['Vacinação', 'Cio', 'Inseminação', 'Retorno de cio', 'Aborto', 'Secagem', 'Parto', 'Falecimento'];

        foreach ($tipos as $tipo) {
            Evento::create([
                'tipo_evento' => $tipo
            ]);
        }
    }
}

