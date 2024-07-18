<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;

class TurnoController extends Controller
{
    public function create()
    {
        return view('turnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'modulos_abiertos' => 'required|integer',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_cierre' => 'required|date_format:H:i',
            'recesos' => 'nullable|string',
        ]);

        Turno::create([
            'modulos_abiertos' => $request->modulos_abiertos,
            'modulos_disponibles' => $request->modulos_abiertos, // Inicializar con el mismo valor de modulos_abiertos
            'hora_inicio' => $request->hora_inicio,
            'hora_cierre' => $request->hora_cierre,
            'recesos' => $request->recesos,
        ]);

        return redirect()->route('nuevo-dia.create')->with('success', 'El día ha sido configurado exitosamente.');
    }
}
