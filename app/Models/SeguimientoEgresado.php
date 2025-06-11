<?php
// app/Models/SeguimientoEgresado.php
// Modelo para la gestión de seguimiento y certificación al egresado

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoEgresado extends Model
{
    use HasFactory;

    protected $fillable = [
        'egresado_id', // Relación con usuario egresado
        'anio',
        'estado',
        'certificaciones', // Texto o JSON
    ];

    public function egresado()
    {
        return $this->belongsTo(User::class, 'egresado_id');
    }
}
