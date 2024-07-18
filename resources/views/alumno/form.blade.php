@extends('layouts.appAlumnos')

@section('title', 'Formulario de registro')

@section('content')

<div class="container-fluid center-card">
    <div class="card shadow">
        <div class="card-body">
            <div class="text-center mt-0 pt-0 ps-lg-5 pe-lg-5">
                <img src="{{ asset('assets/images/logo_uvp_black.png') }}" alt="logoUVP" class="img-fluid">
            </div>
            <div class="barrita mt-2 mb-2"></div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-12 mt-3 ">
                    <form action="{{ route('alumno.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Alumno</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Solicitar Turno</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
   
    

@endsection