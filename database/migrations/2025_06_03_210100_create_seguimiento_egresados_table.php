<?php
// database/migrations/2025_06_03_210100_create_seguimiento_egresados_table.php
// Migración para la tabla de seguimiento y certificación al egresado

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seguimiento_egresados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('egresado_id');
            $table->year('anio');
            $table->enum('estado', ['activo', 'inactivo', 'certificado'])->default('activo');
            $table->text('certificaciones')->nullable();
            $table->timestamps();

            $table->foreign('egresado_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seguimiento_egresados');
    }
};
