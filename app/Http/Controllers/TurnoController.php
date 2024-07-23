<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Alumno;
use App\Models\Module;
use App\Services\ModuloService;

class TurnoController extends Controller
{
    protected $moduloService;

    /**
     * Constructor para inyectar ModuloService.
     *
     * @param ModuloService $moduloService
     */
    public function __construct(ModuloService $moduloService)
    {
        $this->moduloService = $moduloService;
    }

    /**
     * Muestra la vista del módulo.
     *
     * @param int $moduleId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showModule($moduleId)
    {
        $module = $this->getModuleById($moduleId);
        if (!$module) {
            return redirect()->route('nuevo-dia.create')->with('error', 'El módulo solicitado no existe.');
        }

        $alumno = Alumno::where('module_id', $module->id)->first();
        return view('modules.module', compact('module', 'alumno', 'moduleId'));
    }

    /**
     * Marca a un alumno como atendido.
     *
     * @param int $moduleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsAttended($moduleId)
    {
        $module = Module::where('numero', $moduleId)
        ->where('turno_id', Turno::orderBy('created_at', 'desc')->first()->id)
        ->first();

        if (!$module) {
            return redirect()->route('module.show', $moduleId)->with('error', 'El módulo no existe.');
        }
    
        $this->moduloService->attendAlumnoInModule($module);
        $alumno = Alumno::where('module_id', $module->id)->first(); // Recupera el siguiente alumno
    
        return redirect()->route('module.show', $moduleId)->with(['success' => 'El alumno ha sido atendido.', 'alumno' => $alumno]);
    }

    /**
     * Cambia el estado del módulo.
     *
     * @param int $moduleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleModuleState($moduleId)
    {
         // Recupera el módulo basado en el número
         $module = Module::where('numero', $moduleId)->first();
         if (!$module) {
             return redirect()->route('nuevo-dia.create')->with('error', 'El módulo solicitado no existe.');
         }
 
         // Usa el servicio para cambiar el estado del módulo
         $this->moduloService->toggleState($module);
 
         return redirect()->route('module.show', $moduleId)->with('success', 'El estado del módulo ha sido cambiado.');
    }

    public function pantallaVisualizacion()
    {
        $alumnos = Alumno::with('module')->get(); // Obtén los alumnos con los módulos asignados
        return view('pantalla-visualizacion', compact('alumnos')); // Asegúrate de que este nombre coincida con el archivo de vista
    }


    /**
     * Muestra la vista para crear un nuevo día de turnos.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('turnos.create');
    }

    /**
     * Almacena un nuevo día de turnos.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'modulos_abiertos' => 'required|integer',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_cierre' => 'required|date_format:H:i',
            'recesos' => 'nullable|string',
        ]);

        $turno = $this->createTurno($request);
        $moduleNumbers = $this->createModulesForTurno($turno, $request->modulos_abiertos);

        session(['moduleNumbers' => $moduleNumbers]);
        return redirect()->route('nuevo-dia.create')->with('success', 'El día ha sido configurado exitosamente.');
    }

    // Métodos privados para modularizar el código

    /**
     * Obtener módulo por su ID dentro del turno activo.
     *
     * @param int $moduleId
     * @return Module|null
     */
    private function getModuleById($moduleId)
    {
        $turno = Turno::orderBy('created_at', 'desc')->first();
        if (!$turno) {
            return null;
        }

        return $turno->modules()->where('numero', $moduleId)->first();
    }

    /**
     * Crear un nuevo turno con los datos proporcionados.
     *
     * @param Request $request
     * @return Turno
     */
    private function createTurno($request)
    {
        return Turno::create([
            'modulos_abiertos' => $request->modulos_abiertos,
            'modulos_disponibles' => $request->modulos_abiertos,
            'hora_inicio' => $request->hora_inicio,
            'hora_cierre' => $request->hora_cierre,
            'recesos' => $request->recesos,
        ]);
    }

    /**
     * Crear los módulos correspondientes para el turno y retornar los números de los módulos.
     *
     * @param Turno $turno
     * @param int $modulosAbiertos
     * @return array
     */
    private function createModulesForTurno($turno, $modulosAbiertos)
    {
        $moduleNumbers = [];
        for ($i = 1; $i <= $modulosAbiertos; $i++) {
            $turno->modules()->create([
                'estado' => 'abierto',
                'numero' => $i,
            ]);
            $moduleNumbers[] = $i;
        }
        return $moduleNumbers;
    }
}
