<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('eventos', function (Blueprint $table) {
            $table->foreignId('grupo_vaca_id')->nullable()->constrained('grupo_vaca');
        });
    }

    public function down(): void {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropForeign(['grupo_vaca_id']);
            $table->dropColumn('grupo_vaca_id');
        });
    }
};
