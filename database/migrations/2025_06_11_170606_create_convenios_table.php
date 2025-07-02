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
        Schema::create('convenios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 255);
            $table->string('resolucion', 255)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->enum('estado', ['Vigente', 'Caducado', 'En Tramite']);
            $table->unsignedBigInteger('entidad_id');
            $table->unsignedBigInteger('documento_id')->nullable()->comment('Enlace al documento PDF del convenio escaneado.');
            $table->timestamps();

            $table->foreign('entidad_id')->references('id')->on('entidades');
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convenios');
    }
};
