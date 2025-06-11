<?php
// app/Http/Controllers/ExtensionUniversitariaController.php
// Controlador profesional para CRUD de Extensión Universitaria

namespace App\Http\Controllers;

use App\Models\ExtensionUniversitaria;
use App\Models\User;
use Illuminate\Http\Request;

class ExtensionUniversitariaController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', ExtensionUniversitaria::class);
        $eventos = ExtensionUniversitaria::with('responsable')->paginate(10);
        return view('areas.extension.index', compact('eventos'));
    }

    public function create()
    {
        $this->authorize('create', ExtensionUniversitaria::class);
        $usuarios = User::all();
        return view('areas.extension.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', ExtensionUniversitaria::class);
        $request->validate([
            'evento' => ['required','string','max:255'],
            'responsable_id' => ['required','exists:users,id'],
            'participantes' => ['nullable','string','min:3'],
            'estado' => ['required','in:pendiente,en_progreso,finalizado,cancelado'],
            'fecha_inicio' => ['nullable','date'],
            'fecha_fin' => ['nullable','date','after_or_equal:fecha_inicio'],
        ], [
            'evento.required' => 'El nombre del evento es obligatorio.',
            'participantes.min' => 'Debe indicar al menos 3 caracteres para participantes.',
            'responsable_id.required' => 'Debe seleccionar un responsable.',
            'estado.required' => 'Debe seleccionar un estado.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la de inicio.',
        ]);
        ExtensionUniversitaria::create($request->all());
        return redirect()->route('extension.index')->with('success', 'Evento creado correctamente.');
    }

    public function edit(ExtensionUniversitaria $extension)
    {
        $this->authorize('update', $extension);
        $usuarios = User::all();
        return view('areas.extension.edit', compact('extension', 'usuarios'));
    }

    public function update(Request $request, ExtensionUniversitaria $extension)
    {
        $this->authorize('update', $extension);
        $request->validate([
            'evento' => ['required','string','max:255'],
            'responsable_id' => ['required','exists:users,id'],
            'participantes' => ['nullable','string','min:3'],
            'estado' => ['required','in:pendiente,en_progreso,finalizado,cancelado'],
            'fecha_inicio' => ['nullable','date'],
            'fecha_fin' => ['nullable','date','after_or_equal:fecha_inicio'],
        ], [
            'evento.required' => 'El nombre del evento es obligatorio.',
            'participantes.min' => 'Debe indicar al menos 3 caracteres para participantes.',
            'responsable_id.required' => 'Debe seleccionar un responsable.',
            'estado.required' => 'Debe seleccionar un estado.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la de inicio.',
        ]);
        $extension->update($request->all());
        return redirect()->route('extension.index')->with('success', 'Evento actualizado correctamente.');
    }

    public function destroy(ExtensionUniversitaria $extension)
    {
        $this->authorize('delete', $extension);
        $extension->delete();
        return redirect()->route('extension.index')->with('success', 'Evento eliminado correctamente.');
    }
}
