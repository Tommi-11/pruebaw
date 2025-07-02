<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categorias_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->unique()->comment('Ej: Normativa, Resolución, Requisito, Convenio Escaneado.');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categorias_documentos');
    }
};
