<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objetivos_desarrollo_sostenible', function (Blueprint $table) {
            $table->increments('id')->comment('ID del 1 al 17 para cada ODS.');
            $table->string('nombre', 255)->unique();
            $table->text('descripcion')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('objetivos_desarrollo_sostenible');
    }
};
