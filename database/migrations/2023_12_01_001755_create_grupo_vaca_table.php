<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('grupo_vaca', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('vaca_id');
            $table->timestamps();

            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('vaca_id')->references('id')->on('vacas')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('grupo_vaca');
    }
};
