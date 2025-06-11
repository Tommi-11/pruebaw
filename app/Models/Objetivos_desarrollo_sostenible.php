<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivos_desarrollo_sostenible extends Model
{
    use HasFactory;

    protected $table = 'objetivos_desarrollo_sostenible';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function proyectos()
    {
        return $this->belongsToMany(Proyectos::class, 'proyecto_objetivo_desarrollo', 'objetivo_id', 'proyecto_id');
    }
}
