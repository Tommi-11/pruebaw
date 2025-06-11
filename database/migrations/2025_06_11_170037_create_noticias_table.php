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
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo', 255);
            $table->text('descripcion');
            $table->string('imagen_path', 255)->nullable()->comment('Ruta a la imagen asociada. Debe ser JPG, PNG o WebP, max 5MB.');
            $table->timestamp('fecha_publicacion')->useCurrent();
            $table->unsignedBigInteger('user_id')->comment('Usuario que publicó la noticia.');
            $table->enum('area_origen', ['RSU', 'Seguimiento al Egresado', 'Proyeccion Social', 'Extension Universitaria'])->comment('Identifica el área que publica la noticia.');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
