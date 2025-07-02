<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informes_finales extends Model
{
    use HasFactory;

    protected $table = 'informes_finales';

    protected $fillable = [
        'proyecto_id',
        'lineas_investigacion',
        'semestre_academico',
        'organizacion_ejecutora',
        'numero_beneficiarios_reales',
        'fecha_presentacion',
        'integrantes_equipo_final',
        'impacto_comunidad',
    ];

    protected $casts = [
        'integrantes_equipo_final' => 'array',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class, 'proyecto_id');
    }
}
