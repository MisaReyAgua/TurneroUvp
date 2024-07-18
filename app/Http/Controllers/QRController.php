<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Alumno;
use App\Models\Turno;

class QRController extends Controller
{
    public function show()
    {
        $url = route('alumno.form');
        $qrCode = QrCode::size(300)->generate($url);

        return view('qr.show', compact('qrCode'));
    }

    public function alumnoForm()
    {
        return view('alumno.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Obtener el turno activo
        $turno = Turno::latest()->first();

        if (!$turno) {
            return redirect()->route('alumno.form')->with('error', 'No hay turnos configurados para el día.');
        }

        // Lógica para añadir el alumno a la fila de espera
        $alumno = Alumno::create([
            'nombre' => $request->nombre,
        ]);

        // Verificar disponibilidad de módulos
        if ($turno->modulos_disponibles > 0) {
            // Asignar el siguiente módulo disponible
            $alumno->update(['modulo_asignado' => $turno->modulos_abiertos - $turno->modulos_disponibles + 1]);
            $turno->decrement('modulos_disponibles');
        } else {
            // Poner al alumno en espera (sin módulo asignado)
            $alumno->update(['modulo_asignado' => null]);
        }

        return redirect()->route('alumno.form')->with('success', 'Has sido añadido a la fila de espera. Espera tu turno para pasar al módulo asignado.');
    }
}
