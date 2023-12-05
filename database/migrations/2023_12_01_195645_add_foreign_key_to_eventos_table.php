<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_vaca_id')->nullable();
            $table->foreign('grupo_vaca_id')->references('id')->on('grupo_vaca');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropForeign(['grupo_vaca_id']);
            $table->dropColumn('grupo_vaca_id');
        });
    }
};
