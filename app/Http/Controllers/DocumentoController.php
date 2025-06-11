<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Documento;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DocumentoController extends Controller
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
            'categoria' => 'required|string|max:100',
            'file' => 'required|file|mimes:pdf|max:10240', // 10MB
        ]);
        $file = $request->file('file');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('documentos', $filename, 'public');
        $documento = Documento::create([
            'titulo' => $request->titulo,
            'path' => $path,
            'tipo_mime' => $file->getClientMimeType(),
            'tamaño' => $file->getSize(),
            'user_id' => Auth::id(),
            'categoria' => $request->categoria,
        ]);
        return response()->json(['success' => true, 'documento' => $documento]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download(Documento $documento)
    {
        $user = Auth::user();
        // Ejemplo de control de acceso: solo admins o dueños pueden descargar
        if ($user->role->name !== 'Administrador' && $user->id !== $documento->user_id) {
            abort(403, 'No tienes permiso para descargar este documento.');
        }
        $filePath = storage_path('app/public/' . $documento->path);
        if (!file_exists($filePath)) {
            abort(404, 'Archivo no encontrado.');
        }
        return response()->download($filePath, $documento->titulo . '.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
