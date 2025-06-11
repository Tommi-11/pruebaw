<?php
// app/Http/Controllers/ProyeccionSocialController.php
// Controlador profesional para CRUD de Proyección Social

namespace App\Http\Controllers;

use App\Models\ProyeccionSocial;
use App\Models\User;
use Illuminate\Http\Request;

class ProyeccionSocialController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', ProyeccionSocial::class);
        $proyectos = ProyeccionSocial::with('responsable')->paginate(10);
        return view('areas.proyeccion.index', compact('proyectos'));
    }

    public function create()
    {
        $this->authorize('create', ProyeccionSocial::class);
        $usuarios = User::all();
        return view('areas.proyeccion.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', ProyeccionSocial::class);
        $request->validate([
            'proyecto' => ['required','string','max:255'],
            'beneficiarios' => ['nullable','string','min:5'],
            'responsable_id' => ['required','exists:users,id'],
            'estado' => ['required','in:pendiente,en_progreso,finalizado,cancelado'],
            'fecha_inicio' => ['nullable','date'],
            'fecha_fin' => ['nullable','date','after_or_equal:fecha_inicio'],
        ], [
            'proyecto.required' => 'El nombre del proyecto es obligatorio.',
            'beneficiarios.min' => 'Debe indicar al menos 5 caracteres para beneficiarios.',
            'responsable_id.required' => 'Debe seleccionar un responsable.',
            'estado.required' => 'Debe seleccionar un estado.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la de inicio.',
        ]);
        ProyeccionSocial::create($request->all());
        return redirect()->route('proyeccion.index')->with('success', 'Proyecto creado correctamente.');
    }

    public function edit(ProyeccionSocial $proyeccion)
    {
        $this->authorize('update', $proyeccion);
        $usuarios = User::all();
        return view('areas.proyeccion.edit', compact('proyeccion', 'usuarios'));
    }

    public function update(Request $request, ProyeccionSocial $proyeccion)
    {
        $this->authorize('update', $proyeccion);
        $request->validate([
            'proyecto' => ['required','string','max:255'],
            'beneficiarios' => ['nullable','string','min:5'],
            'responsable_id' => ['required','exists:users,id'],
            'estado' => ['required','in:pendiente,en_progreso,finalizado,cancelado'],
            'fecha_inicio' => ['nullable','date'],
            'fecha_fin' => ['nullable','date','after_or_equal:fecha_inicio'],
        ], [
            'proyecto.required' => 'El nombre del proyecto es obligatorio.',
            'beneficiarios.min' => 'Debe indicar al menos 5 caracteres para beneficiarios.',
            'responsable_id.required' => 'Debe seleccionar un responsable.',
            'estado.required' => 'Debe seleccionar un estado.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la de inicio.',
        ]);
        $proyeccion->update($request->all());
        return redirect()->route('proyeccion.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(ProyeccionSocial $proyeccion)
    {
        $this->authorize('delete', $proyeccion);
        $proyeccion->delete();
        return redirect()->route('proyeccion.index')->with('success', 'Proyecto eliminado correctamente.');
    }
}
