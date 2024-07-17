<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

        // Aquí puedes agregar la lógica para añadir el alumno a la fila de espera.
        
        return redirect()->route('alumno.form')->with('success', 'Has sido añadido a la fila de espera.');
    }
}

