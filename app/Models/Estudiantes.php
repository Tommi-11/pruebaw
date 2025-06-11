<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'codigo_universidad',
        'dni',
        'celular',
        'facultad_id',
    ];

    public function facultad()
    {
        return $this->belongsTo(Facultades::class, 'facultad_id');
    }

    public function proyectos()
    {
        return $this->belongsToMany(Proyectos::class, 'proyecto_estudiante', 'estudiante_id', 'proyecto_id');
    }
}
