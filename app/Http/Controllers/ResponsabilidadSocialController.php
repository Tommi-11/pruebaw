<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Noticias;
use App\Models\Documentos;

class ResponsabilidadSocialController extends Controller
{
    //
    public function index()
    {
        // Noticias más recientes (máximo 10)
        $noticias = Noticias::orderBy('fecha_publicacion', 'desc')
            ->take(10)
            ->get(['id', 'titulo', 'descripcion', 'imagen_path', 'area_origen', 'fecha_publicacion']);

        // Documentos más recientes (máximo 10)
        $documentos = Documentos::orderBy('created_at', 'desc')
            ->take(10)
            ->get(['id', 'titulo', 'path_archivo', 'formato', 'tamano_mb', 'categoria_id']);

        return view('responsabilidad-social', compact('noticias', 'documentos'));
    }
}
