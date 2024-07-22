<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Alumno;
use App\Services\ModuloService;

/**
 * Controlador para manejar la generación de códigos QR y la asignación de alumnos a módulos.
 */
class QRController extends Controller
{
    /**
     * @var ModuloService
     */
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
     * Muestra la vista con el código QR.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Generar el código QR con la URL del formulario de registro
        $qrCode = $this->generateQrCode(route('alumno.form'));
        return view('qr.show', compact('qrCode'));
    }

    /**
     * Muestra el formulario para registrar un alumno.
     *
     * @return \Illuminate\View\View
     */
    public function alumnoForm()
    {
        return view('alumno.form');
    }

    /**
     * Maneja el almacenamiento de un nuevo alumno.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Crear un nuevo alumno y asignar un módulo
        $alumno = $this->createAlumno($request);
        $this->moduloService->asignarModulo($alumno);

        // Redirigir al formulario con un mensaje de éxito
        return redirect()->route('alumno.form')->with('success', 'Has sido añadido a la fila de espera. Espera tu turno para pasar al módulo asignado.');
    }

    /**
     * Genera un código QR para una URL dada.
     *
     * @param string $url
     * @return string
     */
    private function generateQrCode($url)
    {
        return QrCode::size(300)->generate($url);
    }

    /**
     * Crea un nuevo alumno a partir de la solicitud.
     *
     * @param Request $request
     * @return Alumno
     */
    private function createAlumno(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Crear y devolver el nuevo alumno
        return Alumno::create([
            'nombre' => $request->nombre,
        ]);
    }
}
