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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('tematica')->nullable()->comment('Temática del proyecto.');
            $table->string('titulo', 255);
            $table->text('lineas_rsu')->nullable()->comment('Línea(s) de Responsabilidad Social Universitaria.');
            $table->json('objetivos_desarrollo_sostenible')->nullable()->comment('Almacena los ODS seleccionados, ej: [1, 5, 10].');
            $table->string('ubicacion_localidad', 255)->nullable();
            $table->string('ubicacion_distrito', 255)->nullable();
            $table->string('ubicacion_provincia', 255)->nullable();
            $table->unsignedInteger('beneficiarios_numero_minimo')->nullable();
            $table->unsignedInteger('beneficiarios_numero_maximo')->nullable();
            $table->text('acciones_concretas')->nullable()->comment('Acciones concretas del proyecto.');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->enum('estado', ['Registrado', 'Aprobado', 'En Curso', 'Rechazado', 'Finalizado', 'Con Informe'])->default('Registrado');
            $table->unsignedBigInteger('docente_tutor_id')->comment('Docente tutor del proyecto. Apunta a la tabla `docentes`.');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('docente_tutor_id')->references('id')->on('docentes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
