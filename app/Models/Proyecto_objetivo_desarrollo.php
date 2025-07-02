<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_objetivo_desarrollo extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = ['proyecto_id', 'objetivo_id'];
    protected $table = 'proyecto_objetivo_desarrollos';

    protected $fillable = [
        'proyecto_id',
        'objetivo_id',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class, 'proyecto_id');
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivos_desarrollo_sostenible::class, 'objetivo_id');
    }
}
