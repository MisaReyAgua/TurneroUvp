@extends('layouts.app')

@section('title', 'Generación de QR')

@section('content')
<div class="container mt-5 text-center">
    <h2>QR Generado</h2>
    <div>
        {!! $qrCode !!}
    </div>
    {{-- <a href="{{ route('generar-qr') }}" class="btn btn-secondary mt-3">Generar otro QR</a> --}}
</div>
@endsection
