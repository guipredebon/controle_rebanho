<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model {
    use HasFactory;

    protected $fillable = ['nome'];

    public function vacas() {
        return $this->belongsToMany(Vaca::class, 'grupo_vaca', 'grupo_id', 'vaca_id');
    }
}
