<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//
use Illuminate\Support\Facades\Storage;

class Noticias extends Model
{
    use HasFactory;

    protected $table = 'noticias';

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen_path',
        'fecha_publicacion',
        'user_id',
        'area_origen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    
}
