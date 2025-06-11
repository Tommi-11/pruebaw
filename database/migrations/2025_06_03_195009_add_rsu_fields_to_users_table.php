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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'coordinator', 'faculty', 'student', 'egresado', 'externo'])
                ->default('student');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('document_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Elimina la clave foránea solo si existe
            if (Schema::hasColumn('users', 'area_id')) {
                try {
                    $table->dropForeign(['area_id']);
                } catch (\Exception $e) {
                    // Si no existe la foreign key, ignora el error
                }
            }
            $table->dropColumn([
                'role',
                'area_id',
                'phone',
                'address',
                'document_number'
            ]);
        });
    }
};
