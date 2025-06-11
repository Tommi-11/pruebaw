<?php
// app/Models/RSU.php
// Modelo para la gestión de proyectos de Responsabilidad Social Universitaria (RSU)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSU extends Model
{
    use HasFactory;

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'responsable_id', // Relación con usuario responsable
        'estado',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Relación con el usuario responsable
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}
