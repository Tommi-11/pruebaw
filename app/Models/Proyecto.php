<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }

    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }
}
