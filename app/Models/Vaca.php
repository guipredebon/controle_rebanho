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
        'grupo',
    ];

    // Permite acessar todos os eventos relacionados a uma vaca específica.
    public function eventos() {
        return $this->hasMany(Evento::class, 'animal_id');
    }

    public function grupos() {
        return $this->belongsToMany(Grupo::class, 'grupo_vaca', 'vaca_id', 'grupo_id');
    }
}
