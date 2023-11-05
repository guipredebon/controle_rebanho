<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    public function vaca()
    {
        return $this->belongsTo(Vaca::class, 'animal_id');
    }
    
    public function tipoEvento()
    {
        return $this->belongsTo(TipoEvento::class, 'tipo_evento_id');
    }
    
}
