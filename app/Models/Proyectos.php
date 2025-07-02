<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'tematica',
        'titulo',
        'lineas_rsu',        
        'ubicacion_localidad',
        'ubicacion_distrito',
        'ubicacion_provincia',
        'beneficiarios_numero_minimo',
        'beneficiarios_numero_maximo',
        'acciones_concretas',
        'fecha_inicio',
        'fecha_termino',
        'estado',
        'docente_tutor_id',
    ];    

    public function docenteTutor()
    {
        return $this->belongsTo(Docente::class, 'docente_tutor_id');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiantes::class, 'proyecto_estudiantes', 'proyecto_id', 'estudiante_id');
    }

    public function objetivos()
    {
        return $this->belongsToMany(Objetivos_desarrollo_sostenible::class, 'proyecto_objetivo_desarrollos', 'proyecto_id', 'objetivo_id');
    }

    public function informeFinal()
    {
        return $this->hasOne(Informes_finales::class, 'proyecto_id');
    }
}
