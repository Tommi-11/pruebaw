<?php
// database/migrations/2025_06_03_210300_create_extension_universitarias_table.php
// Migración para la tabla de Extensión Universitaria

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('extension_universitarias', function (Blueprint $table) {
            $table->id();
            $table->string('evento');
            $table->unsignedBigInteger('responsable_id');
            $table->string('participantes')->nullable();
            $table->enum('estado', ['pendiente', 'en_progreso', 'finalizado', 'cancelado'])->default('pendiente');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('extension_universitarias');
    }
};
