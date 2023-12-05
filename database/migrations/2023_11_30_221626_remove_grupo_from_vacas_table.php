<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::table('vacas', function (Blueprint $table) {
            $table->dropColumn('grupo');
        });
    }

    public function down(): void {
        Schema::table('vacas', function (Blueprint $table) {
            $table->string('grupo')->nullable()->after('raca');
        });
    }
};
