<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    protected $table = 'entidades';
    protected $fillable = [
        'nombre',
        'tipo',
    ];

    // Relaciones futuras aquí

    public function convenios()
    {
        return $this->hasMany(Convenios::class, 'entidad_id');
    }
}
