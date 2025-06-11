<?php
// app/Models/ExtensionUniversitaria.php
// Modelo para la gestión de eventos de Extensión Universitaria

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtensionUniversitaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento',
        'responsable_id',
        'participantes', // Puede ser texto o JSON
        'estado',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}
