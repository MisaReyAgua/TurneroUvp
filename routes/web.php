<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController; 
use App\Http\Controllers\QRController;
// Asegúrate de importar el controlador

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/nuevo-dia', [TurnoController::class, 'create'])->name('nuevo-dia.create');
Route::post('/nuevo-dia', [TurnoController::class, 'store'])->name('nuevo-dia.store');

Route::get('/generar-qr', [QRController::class, 'show'])->name('generar-qr');
Route::get('/alumno-form', [QRController::class, 'alumnoForm'])->name('alumno.form');
Route::post('/alumno-form', [QRController::class, 'store'])->name('alumno.store');
