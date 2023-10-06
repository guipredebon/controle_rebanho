<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroReproducao extends Model {
    use HasFactory;

    // Definindo a relação, indicando que um registro de reprodução pertence a uma vaca
    public function Vaca() {
        return $this->belongsTo(Vaca::class);
    }
}
