@extends('layouts.app')

@section('title', 'Módulo ' . $moduleId)

@section('content')
<div class="container mt-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Módulo {{ $moduleId }}</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <p><strong>Estado del Módulo:</strong> {{ $module->estado }}</p>
                    @if(session('alumno') || $alumno)
                        <p><strong>Alumno Atendido:</strong> {{ session('alumno')->nombre ?? $alumno->nombre }}</p>
                        <form action="{{ route('module.attended', $moduleId) }}" method="POST" class="mb-2">
                            @csrf
                            <button type="submit" class="btn btn-success">Marcar como Atendido</button>
                        </form>
                    @else
                        <p>No hay alumno asignado a este módulo.</p>
                    @endif
                    <form action="{{ route('module.toggle', $moduleId) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Cambiar Estado del Módulo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
