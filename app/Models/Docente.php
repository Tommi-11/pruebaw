<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';
    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'facultad_id',
        'departamento',
        'celular',
    ];

    public function facultad()
    {
        return $this->belongsTo(Facultades::class, 'facultad_id');
    }

    public function proyectos()
    {
        return $this->hasMany(Proyectos::class, 'docente_tutor_id');
    }
}
