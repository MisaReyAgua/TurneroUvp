@extends('layouts.app')

@section('title', 'Formulario de registro')

@section('content')
<div class="container mt-5">
    <h2>Solicitar Turno</h2>
    <form action="{{ route('alumno.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Alumno</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Solicitar Turno</button>
    </form>
</div>
@endsection