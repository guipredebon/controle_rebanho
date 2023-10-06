<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('registros_reproducao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vaca_id'); // Chave estrangeira para a tabela de vacas
            $table->enum('tipo_registro', ['inseminação', 'vacinação','parto'])->default('inseminação');
            $table->date('data_registro');
            $table->timestamps();
            // Defina a chave estrangeira
            $table->foreign('vaca_id')->references('id')->on('vacas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        //
    }
};
