
@extends('layouts.adminlte')

@section('title', 'Detalles del Profesor')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Información del Profesor</h3>
    </div>

    <div class="card-body">
        <p><strong>ID:</strong> {{ $profesore->id }}</p>
        <p><strong>Nombre:</strong> {{ $profesore->nombre }}</p>
        <p><strong>Apellido:</strong> {{ $profesore->apellido }}</p>
    </div>

    <div class="card-footer">
        @if(auth()->user()->esAdmin())
            <a href="{{ route('profesores.edit', $profesore) }}"
               class="btn btn-warning">Editar</a>
        @endif

        <a href="{{ route('profesores.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
</div>
@endsection
