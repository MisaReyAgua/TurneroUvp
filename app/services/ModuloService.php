<?php

namespace App\Services;

use App\Models\Alumno;
use App\Models\Module;

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
        $moduloDisponible = Module::where('estado', 'abierto')->doesntHave('alumnos')->first();
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
        $alumno = Alumno::where('module_id', $module->id)->first();
        if ($alumno) {
            $alumno->delete();
        }

        $nextAlumno = Alumno::whereNull('module_id')->orderBy('created_at')->first();
        if ($nextAlumno) {
            $nextAlumno->module_id = $module->id;
            $nextAlumno->save();
        }
    }

    /**
     * Cambia el estado del módulo entre abierto y cerrado.
     *
     * @param Module $module
     * @return void
     */
    public function toggleState($module)
    {
        $module->estado = $module->estado == 'abierto' ? 'cerrado' : 'abierto';
        $module->save();

        if ($module->estado == 'abierto') {
            $nextAlumno = Alumno::whereNull('module_id')->orderBy('created_at')->first();
            if ($nextAlumno) {
                $nextAlumno->module_id = $module->id;
                $nextAlumno->save();
            }
        }
    }
}
