<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaDocumento extends Model
{
    use HasFactory;

    protected $table = 'categorias_documentos';

    protected $fillable = [
        'nombre',
    ];

    public function documentos()
    {
        return $this->hasMany(Documentos::class, 'categoria_id');
    }
}
