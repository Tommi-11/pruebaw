<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
    use HasFactory;

    protected $table = 'convenios';

    protected $fillable = [
        'nombre',
        'resolucion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'entidad_id',
        'documento_id',
    ];

    public function entidad()
    {
        return $this->belongsTo(Entidad::class, 'entidad_id');
    }

    public function documento()
    {
        return $this->belongsTo(Documentos::class, 'documento_id');
    }
}
