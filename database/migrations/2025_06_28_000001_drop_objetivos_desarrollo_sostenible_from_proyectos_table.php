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
        if (Schema::hasColumn('proyectos', 'objetivos_desarrollo_sostenible')) {
            Schema::table('proyectos', function (Blueprint $table) {
                $table->dropColumn('objetivos_desarrollo_sostenible');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->json('objetivos_desarrollo_sostenible')->nullable()->comment('Almacena los ODS seleccionados, ej: [1, 5, 10].');
        });
    }
};
