<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Turno;
use App\Models\Alumno;
use App\Models\Module;

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
        // Validar el request
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        // Crear el alumno
        $alumno = Alumno::create([
            'nombre' => $request->nombre,
        ]);
    
        // Asignar módulo si hay uno disponible
        $this->asignarModulo($alumno);
    
        return redirect()->route('alumno.form')->with('success', 'Has sido añadido a la fila de espera. Espera tu turno para pasar al módulo asignado.');
    }
    
    protected function asignarModulo(Alumno $alumno)
    {
        // Buscar un módulo disponible
        $moduloDisponible = Module::where('estado', 'abierto')->doesntHave('alumnos')->first();
    
        if ($moduloDisponible) {
            $alumno->module_id = $moduloDisponible->id;
            $alumno->save();
        }
    }
    
}
