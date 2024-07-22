@extends('layouts.app')

@section('title', 'Pantalla de Visualización')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Fila de Espera y Módulos Asignados</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del Alumno</th>
                                <th>Módulo Asignado</th>
                            </tr>
                        </thead>
                        <tbody id="alumnos-table-body"> <!-- Aquí es donde se actualizarán los datos -->
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
