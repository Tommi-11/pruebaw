<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    use HasFactory;

    protected $table = 'facultades';
    protected $fillable = [
        'nombre',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiantes::class, 'facultad_id');
    }

    public function docentes()
    {
        return $this->hasMany(Docente::class, 'facultad_id');
    }
}
