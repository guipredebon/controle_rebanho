<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model {
    use HasFactory;

    protected $table = 'eventos';

    public function vacas() {
        return $this->belongsTo(Vaca::class, 'animal_id');
    }

    public function tipo_evento() {
        return $this->belongsTo(TipoEvento::class, 'tipo_evento_id');
    }
}
