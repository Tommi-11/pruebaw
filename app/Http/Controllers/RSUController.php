<?php
// app/Http/Controllers/RSUController.php
// Controlador profesional para CRUD de proyectos RSU

namespace App\Http\Controllers;

use App\Models\RSU;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RSUController extends Controller
{
    // Muestra la lista de proyectos RSU
    public function index()
    {
        $this->authorize('viewAny', RSU::class);
        $rsus = RSU::with('responsable')->paginate(10);
        return view('areas.rsu.index', compact('rsus'));
    }

    // Muestra el formulario de creación
    public function create()
    {
        $this->authorize('create', RSU::class);
        $usuarios = User::all();
        return view('areas.rsu.create', compact('usuarios'));
    }

    // Guarda un nuevo proyecto RSU
    public function store(Request $request)
    {
        $this->authorize('create', RSU::class);
        $request->validate([
            'nombre' => ['required','string','max:255'],
            'descripcion' => ['nullable','string','min:5'],
            'responsable_id' => ['required','exists:users,id'],
            'estado' => ['required','in:pendiente,en_progreso,finalizado,cancelado'],
            'fecha_inicio' => ['nullable','date'],
            'fecha_fin' => ['nullable','date','after_or_equal:fecha_inicio'],
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'descripcion.min' => 'La descripción debe tener al menos 5 caracteres.',
            'responsable_id.required' => 'Debe seleccionar un responsable.',
            'estado.required' => 'Debe seleccionar un estado.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la de inicio.',
        ]);
        RSU::create($request->all());
        return redirect()->route('rsu.index')->with('success', 'Proyecto RSU creado correctamente.');
    }

    // Muestra el formulario de edición
    public function edit(RSU $rsu)
    {
        $this->authorize('update', $rsu);
        $usuarios = User::all();
        return view('areas.rsu.edit', compact('rsu', 'usuarios'));
    }

    // Actualiza un proyecto RSU
    public function update(Request $request, RSU $rsu)
    {
        $this->authorize('update', $rsu);
        $request->validate([
            'nombre' => ['required','string','max:255'],
            'descripcion' => ['nullable','string','min:5'],
            'responsable_id' => ['required','exists:users,id'],
            'estado' => ['required','in:pendiente,en_progreso,finalizado,cancelado'],
            'fecha_inicio' => ['nullable','date'],
            'fecha_fin' => ['nullable','date','after_or_equal:fecha_inicio'],
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'descripcion.min' => 'La descripción debe tener al menos 5 caracteres.',
            'responsable_id.required' => 'Debe seleccionar un responsable.',
            'estado.required' => 'Debe seleccionar un estado.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la de inicio.',
        ]);
        $rsu->update($request->all());
        return redirect()->route('rsu.index')->with('success', 'Proyecto RSU actualizado correctamente.');
    }

    // Elimina un proyecto RSU
    public function destroy(RSU $rsu)
    {
        $this->authorize('delete', $rsu);
        $rsu->delete();
        return redirect()->route('rsu.index')->with('success', 'Proyecto RSU eliminado correctamente.');
    }
}
