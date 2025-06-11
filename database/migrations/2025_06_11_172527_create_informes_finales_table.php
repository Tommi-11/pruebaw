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
        Schema::create('informes_finales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proyecto_id')->unique()->comment('Cada proyecto tiene un único informe final.');
            $table->text('lineas_investigacion')->nullable();
            $table->string('semestre_academico', 20)->nullable()->comment('Semestre de ejecución, ej: 2024-I.');
            $table->string('organizacion_ejecutora', 255)->nullable()->comment('Organización/Institución en la que se ejecuta el proyecto.');
            $table->unsignedInteger('numero_beneficiarios_reales')->nullable()->comment('Número final de beneficiarios alcanzados.');
            $table->date('fecha_presentacion')->comment('Fecha de presentación del informe.');
            $table->json('integrantes_equipo_final')->nullable()->comment('Almacena listas de docentes, estudiantes y administrativos del informe final.');
            $table->text('impacto_comunidad')->nullable()->comment('Descripción breve del impacto del proyecto en la comunidad.');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informes_finales');
    }
};
