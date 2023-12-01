<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGrupoVacasTable  extends Migration {

    public function up(): void {
        Schema::table('vacas', function (Blueprint $table) {
            $table->string('grupo')->nullable()->after('raca');
        });
    }

    public function down(): void {
        Schema::table('vacas', function (Blueprint $table) {
            $table->dropColumn('groupo');
        });
    }
};
