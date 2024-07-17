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

        Turno::create($request->all());

        

        return redirect()->route('nuevo-dia.create')->with('success', 'El día ha sido configurado exitosamente.');
    }
}
