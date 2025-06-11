<?php
// database/migrations/2025_06_03_210000_create_rsus_table.php
// Migración para la tabla de proyectos RSU

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rsus', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('responsable_id');
            $table->enum('estado', ['pendiente', 'en_progreso', 'finalizado', 'cancelado'])->default('pendiente');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();

            // Clave foránea al usuario responsable
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rsus');
    }
};
