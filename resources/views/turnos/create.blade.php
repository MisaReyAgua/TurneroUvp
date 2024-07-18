@extends('layouts.app')

@section('title', 'Configuración del Día')

@section('content')
<div class="container mt-1 mb-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Configuración del Nuevo Día</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('nuevo-dia.store') }}" class="row g-3" method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="modulos_abiertos" class="form-label">Número de Módulos Abiertos</label>
                            <input type="number" class="form-control" id="modulos_abiertos" name="modulos_abiertos" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hora_cierre" class="form-label">Hora de Cierre</label>
                            <input type="time" class="form-control" id="hora_cierre" name="hora_cierre" required>
                        </div>
                        <div class="col-12">
                            <label for="recesos" class="form-label">Recesos (Opcional)</label>
                            <textarea class="form-control" id="recesos" name="recesos" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar Configuración</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
