<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Alumno;
use App\Models\Module;

class TurnoController extends Controller
{
    // Método para mostrar la vista del módulo
    public function showModule($moduleId)
{
    // Obtener el turno activo (último creado)
    $turno = Turno::orderBy('created_at', 'desc')->first();

    // Obtener el módulo específico por número dentro del turno
    $module = $turno->modules()->where('numero', $moduleId)->first();

    if (!$module) {
        return redirect()->route('nuevo-dia.create')->with('error', 'El módulo solicitado no existe.');
    }

    // Obtener el alumno que está siendo atendido en este módulo
    $alumno = Alumno::where('modulo_asignado', $module->id)->first();

    return view('modules.module', compact('module', 'alumno'));
}

    // Método para marcar a un alumno como atendido
    public function markAsAttended($moduleId)
    {
        // Obtener el alumno que está siendo atendido en este módulo
        $alumno = Alumno::where('modulo_asignado', $moduleId)->first();
        
        if ($alumno) {
            // Marcar al alumno como atendido
            $alumno->delete();
        }

        // Obtener el próximo alumno en la fila de espera
        $nextAlumno = Alumno::whereNull('modulo_asignado')->orderBy('created_at')->first();
        
        if ($nextAlumno) {
            // Asignar el próximo alumno a este módulo
            $nextAlumno->modulo_asignado = $moduleId;
            $nextAlumno->save();
        }

        return redirect()->route('module.show', $moduleId)->with('success', 'El alumno ha sido atendido.');
    }

    // Método para cambiar el estado del módulo
    public function toggleModuleState($moduleId)
    {
        // Obtener el módulo específico
        $module = Module::findOrFail($moduleId);

        // Cambiar el estado del módulo
        $module->estado = $module->estado == 'abierto' ? 'cerrado' : 'abierto';
        $module->save();

        // Intentar asignar un nuevo alumno al módulo si se vuelve a abrir
        if ($module->estado == 'abierto') {
            $nextAlumno = Alumno::whereNull('modulo_asignado')->orderBy('created_at')->first();
            
            if ($nextAlumno) {
                $nextAlumno->modulo_asignado = $module->id;
                $nextAlumno->save();
            }
        }

        return redirect()->route('module.show', $moduleId)->with('success', 'El estado del módulo ha sido cambiado.');
    }

    // Métodos create y store existentes
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

    // Crear el turno con los datos proporcionados
    $turno = Turno::create([
        'modulos_abiertos' => $request->modulos_abiertos,
        'modulos_disponibles' => $request->modulos_abiertos, // Inicializamos con el mismo número de módulos abiertos
        'hora_inicio' => $request->hora_inicio,
        'hora_cierre' => $request->hora_cierre,
        'recesos' => $request->recesos,
    ]);

    // Crear los módulos para el turno con números consecutivos
    for ($i = 1; $i <= $request->modulos_abiertos; $i++) {
        $turno->modules()->create([
            'estado' => 'abierto',
            'numero' => $i, // Asignar números consecutivos a los módulos
        ]);
    }

    return redirect()->route('nuevo-dia.create')->with('success', 'El día ha sido configurado exitosamente.');
}
}
