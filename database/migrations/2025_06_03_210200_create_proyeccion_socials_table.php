<?php
// database/migrations/2025_06_03_210200_create_proyeccion_socials_table.php
// Migración para la tabla de Proyección Social

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyeccion_socials', function (Blueprint $table) {
            $table->id();
            $table->string('proyecto');
            $table->string('beneficiarios')->nullable();
            $table->unsignedBigInteger('responsable_id');
            $table->enum('estado', ['pendiente', 'en_progreso', 'finalizado', 'cancelado'])->default('pendiente');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyeccion_socials');
    }
};
