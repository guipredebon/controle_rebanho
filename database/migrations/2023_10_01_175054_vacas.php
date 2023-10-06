<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('vacas', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_identificacao');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('raca');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('vacas');
    }
};
