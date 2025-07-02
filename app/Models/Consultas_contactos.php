<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas_contactos extends Model
{
    use HasFactory;

    protected $table = 'consultas_contactos';

    protected $fillable = [
        'nombres_apellidos',
        'email',
        'asunto',
        'mensaje',
        'area_destino',
    ];
}
