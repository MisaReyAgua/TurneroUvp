@extends('layouts.appAlumnos')

@section('title', 'Lista de espera')

@section('content')
<div class="container mt-5">
    
    <div class="text-center mt-0 pt-0 ps-lg-5 pe-lg-5">
        <img src="{{ asset('assets/images/logo_uvp_black.png') }}" alt="logoUVP" class="img-fluid">
    </div>
    <div class="barrita mt-2 mb-2"></div>
    {{-- <h1 class="mb-4">Fila de Espera de Alumnos</h1> --}}

    <!-- Mensaje de estado -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de Alumnos -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered table-espera">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre del Alumno</th>
                        <th>Módulo Asignado</th>
                    </tr>
                </thead>
                <tbody id="alumnos-table-body">
                    @foreach($alumnos as $index => $alumno)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->module ? $alumno->module->numero : 'En espera' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function fetchAlumnos() {
        fetch("{{ route('pantalla.visualizacion') }}")
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, 'text/html');
                const newTableBody = doc.getElementById('alumnos-table-body');
                document.getElementById('alumnos-table-body').innerHTML = newTableBody.innerHTML;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    setInterval(fetchAlumnos, 5000); // Actualiza cada 5 segundos
</script>
@endsection
