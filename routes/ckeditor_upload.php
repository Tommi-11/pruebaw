<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::post('/ckeditor/upload', function(Request $request) {
    $request->validate([
        'upload' => 'required|image|max:10240' // 10MB máximo
    ]);

    if ($request->hasFile('upload')) {
        $path = $request->file('upload')->store('ckeditor', 'public');
        $url = Storage::url($path);
        
        return response()->json([
            'url' => url($url)
        ]);
    }
    
    return response()->json([
        'error' => ['message' => 'Error al subir la imagen']
    ], 400);
})->name('ckeditor.upload');
