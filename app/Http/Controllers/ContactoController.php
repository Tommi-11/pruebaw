<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AreaContactMail;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'required|email',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
            'area' => 'required|string',
        ]);
        // Ejemplo: obtener correo del área
        $areaEmails = [
            'proyeccion' => 'proyeccion@universidad.edu',
            'egresados' => 'egresados@universidad.edu',
            'extension' => 'extension@universidad.edu',
            'responsabilidad' => 'rsu@universidad.edu',
        ];
        $to = $areaEmails[$request->area] ?? 'info@universidad.edu';
        Mail::to($to)->send(new AreaContactMail($request->all()));
        return response()->json(['success' => true]);
    }
}
