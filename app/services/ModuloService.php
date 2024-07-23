<?php

namespace App\Services;

use App\Models\Alumno;
use App\Models\Module;
use App\Models\Turno;
use Illuminate\Support\Facades\DB;

/**
 * Servicio para manejar la asignación y el estado de módulos.
 */
class ModuloService
{
    /**
     * Asigna un módulo disponible a un alumno.
     *
     * @param Alumno $alumno
     * @return void
     */
    public function asignarModulo(Alumno $alumno)
    {
        // Obtén el turno actual
        $turnoActivo = Turno::orderBy('created_at', 'desc')->first();
        
        if (!$turnoActivo) {
            return; // No hay turno activo, no podemos asignar módulos
        }
    
        // Busca un módulo disponible en el turno actual
        $moduloDisponible = Module::where('estado', 'abierto')
            ->where('turno_id', $turnoActivo->id)
            ->doesntHave('alumnos')
            ->first();
    
        if ($moduloDisponible) {
            $alumno->module_id = $moduloDisponible->id;
            $alumno->save();
        }
    }

    /**
     * Marca al alumno asignado al módulo como atendido y asigna al próximo alumno en la fila.
     *
     * @param Module $module
     * @return void
     */
    public function attendAlumnoInModule($module)
    {
        DB::transaction(function () use ($module) {
            // Recupera al alumno asignado al módulo y lo elimina
            $alumno = Alumno::where('module_id', $module->id)->lockForUpdate()->first();
            if ($alumno) {
                $alumno->delete();
            }

            // Asigna el módulo al siguiente alumno en la fila
            $nextAlumno = Alumno::whereNull('module_id')->orderBy('created_at')->lockForUpdate()->first();
            if ($nextAlumno) {
                $nextAlumno->module_id = $module->id;
                $nextAlumno->save();
            }
        });
    }

    /**
     * Cambia el estado del módulo entre abierto y cerrado.
     *
     * @param Module $module
     * @return void
     */
    public function toggleState($module)
    {
        DB::transaction(function () use ($module) {
            $module->estado = $module->estado == 'abierto' ? 'cerrado' : 'abierto';
            $module->save();

            if ($module->estado == 'abierto') {
                $nextAlumno = Alumno::whereNull('module_id')->orderBy('created_at')->lockForUpdate()->first();
                if ($nextAlumno) {
                    $nextAlumno->module_id = $module->id;
                    $nextAlumno->save();
                }
            }
        });
    }
}
