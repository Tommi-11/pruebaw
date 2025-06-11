<?php
// app/Models/ProyeccionSocial.php
// Modelo para la gestión de proyectos de Proyección Social

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyeccionSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto',
        'beneficiarios',
        'responsable_id',
        'estado',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}
