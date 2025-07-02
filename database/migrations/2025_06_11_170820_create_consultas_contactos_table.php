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
        Schema::create('consultas_contactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres_apellidos', 255);
            $table->string('email', 255);
            $table->string('asunto', 255);
            $table->text('mensaje');
            $table->string('area_destino', 100)->comment('Área a la que se envió el correo (ej. RSU, Egresados).');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_contactos');
    }
};
