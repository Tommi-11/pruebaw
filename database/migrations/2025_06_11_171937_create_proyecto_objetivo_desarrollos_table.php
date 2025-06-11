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
        Schema::create('proyecto_objetivo_desarrollos', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedTinyInteger('objetivo_id');
            $table->primary(['proyecto_id', 'objetivo_id']);
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('objetivo_id')->references('id')->on('objetivos_desarrollo_sostenible')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_objetivo_desarrollos');
    }
};
