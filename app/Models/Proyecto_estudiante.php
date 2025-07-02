<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_estudiante extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = ['proyecto_id', 'estudiante_id'];
    protected $table = 'proyecto_estudiantes';

    protected $fillable = [
        'proyecto_id',
        'estudiante_id',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class, 'proyecto_id');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiantes::class, 'estudiante_id');
    }
}
