<?php
// app/Http/Controllers/SeguimientoEgresadoController.php
// Controlador profesional para CRUD de Seguimiento y Certificación al Egresado

namespace App\Http\Controllers;

use App\Models\SeguimientoEgresado;
use App\Models\User;
use Illuminate\Http\Request;

class SeguimientoEgresadoController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', SeguimientoEgresado::class);
        $registros = SeguimientoEgresado::with('egresado')->paginate(10);
        return view('areas.seguimiento.index', compact('registros'));
    }

    public function create()
    {
        $this->authorize('create', SeguimientoEgresado::class);
        $egresados = User::where('role', 'egresado')->get();
        return view('areas.seguimiento.create', compact('egresados'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', SeguimientoEgresado::class);
        $request->validate([
            'egresado_id' => ['required','exists:users,id'],
            'anio' => ['required','integer','min:1900','max:' . date('Y')],
            'estado' => ['required','in:activo,inactivo,certificado'],
            'certificaciones' => ['nullable','string','min:5','max:255'],
        ], [
            'egresado_id.required' => 'Debe seleccionar un egresado.',
            'anio.required' => 'El año es obligatorio.',
            'anio.min' => 'El año debe ser mayor o igual a 1900.',
            'anio.max' => 'El año no puede ser mayor al actual.',
            'estado.required' => 'Debe seleccionar un estado.',
            'certificaciones.min' => 'La certificación debe tener al menos 5 caracteres.',
            'certificaciones.max' => 'La certificación no debe exceder 255 caracteres.',
        ]);
        SeguimientoEgresado::create($request->all());
        return redirect()->route('seguimiento.index')->with('success', 'Registro creado correctamente.');
    }

    public function edit(SeguimientoEgresado $seguimiento)
    {
        $this->authorize('update', $seguimiento);
        $egresados = User::where('role', 'egresado')->get();
        return view('areas.seguimiento.edit', compact('seguimiento', 'egresados'));
    }

    public function update(Request $request, SeguimientoEgresado $seguimiento)
    {
        $this->authorize('update', $seguimiento);
        $request->validate([
            'egresado_id' => ['required','exists:users,id'],
            'anio' => ['required','integer','min:1900','max:' . date('Y')],
            'estado' => ['required','in:activo,inactivo,certificado'],
            'certificaciones' => ['nullable','string','min:5','max:255'],
        ], [
            'egresado_id.required' => 'Debe seleccionar un egresado.',
            'anio.required' => 'El año es obligatorio.',
            'anio.min' => 'El año debe ser mayor o igual a 1900.',
            'anio.max' => 'El año no puede ser mayor al actual.',
            'estado.required' => 'Debe seleccionar un estado.',
            'certificaciones.min' => 'La certificación debe tener al menos 5 caracteres.',
            'certificaciones.max' => 'La certificación no debe exceder 255 caracteres.',
        ]);
        $seguimiento->update($request->all());
        return redirect()->route('seguimiento.index')->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy(SeguimientoEgresado $seguimiento)
    {
        $this->authorize('delete', $seguimiento);
        $seguimiento->delete();
        return redirect()->route('seguimiento.index')->with('success', 'Registro eliminado correctamente.');
    }
}
