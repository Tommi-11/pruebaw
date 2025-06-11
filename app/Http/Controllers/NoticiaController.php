<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Noticia;
use Illuminate\Support\Str;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpg,png,webp|max:5120',
        ]);
        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenPath = $imagen->storeAs('noticias', Str::uuid() . '.' . $imagen->getClientOriginalExtension(), 'public');
        }
        $noticia = Noticia::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_publicacion' => $request->fecha_publicacion,
            'imagen_path' => $imagenPath,
        ]);
        return response()->json(['success' => true, 'noticia' => $noticia]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpg,png,webp|max:5120',
        ]);
        $imagenPath = $noticia->imagen_path;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenPath = $imagen->storeAs('noticias', Str::uuid() . '.' . $imagen->getClientOriginalExtension(), 'public');
        }
        $noticia->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_publicacion' => $request->fecha_publicacion,
            'imagen_path' => $imagenPath,
        ]);
        return response()->json(['success' => true, 'noticia' => $noticia]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        if ($noticia->imagen_path) {
            Storage::disk('public')->delete($noticia->imagen_path);
        }
        $noticia->delete();
        return response()->json(['success' => true]);
    }
}
