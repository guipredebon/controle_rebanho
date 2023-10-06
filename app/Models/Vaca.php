<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaca extends Model {
    use HasFactory;

    protected $fillable = [
        'nro_identificacao',
        'nome',
        'data_nascimento',
        'raca',
    ];

    // Definindo a relação um-para-muitos com os registros de reprodução
    public function RegistroReproducao() {
        return $this->hasMany(RegistroReproducao::class);
    }

}
