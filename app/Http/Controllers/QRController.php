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

        // Asignar módulo si hay uno disponible
        $this->asignarModulo($alumno, $turno);

        return redirect()->route('alumno.form')->with('success', 'Has sido añadido a la fila de espera. Espera tu turno para pasar al módulo asignado.');
    }

    protected function asignarModulo(Alumno $alumno, Turno $turno)
    {
        // Buscar un módulo disponible
        $moduloDisponible = $turno->modules()->where('estado', 'abierto')->doesntHave('alumnos')->first();

        if ($moduloDisponible) {
            $alumno->modulo_asignado = $moduloDisponible->id;
            $alumno->save();
        } else {
            // Poner al alumno en espera (sin módulo asignado)
            $alumno->modulo_asignado = null;
            $alumno->save();
        }
    }
}
