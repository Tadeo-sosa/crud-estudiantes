@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalles del usuario</h1>

        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
            Volver al listado
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            Información del usuario
        </div>

        <div class="card-body">

            <div class="mb-3">
                <strong>ID:</strong>
                {{ $usuario->id }}
            </div>

            <div class="mb-3">
                <strong>Nombre completo:</strong>
                {{ $usuario->name }}
            </div>

            <div class="mb-3">
                <strong>Correo electrónico:</strong>
                {{ $usuario->email }}
            </div>

            <div class="mb-3">
                <strong>Rol:</strong>

                @if($usuario->role === 'admin')
                    <span class="badge bg-primary">Administrador</span>
                @else
                    <span class="badge bg-secondary">Empleado</span>
                @endif
            </div>

            <div class="mb-3">
                <strong>Fecha de registro:</strong>
                {{ $usuario->created_at->format('d/m/Y H:i') }}
            </div>

            <div class="mb-3">
                <strong>Última actualización:</strong>
                {{ $usuario->updated_at->format('d/m/Y H:i') }}
            </div>

            @if(auth()->user()->esAdmin())
                <a href="{{ route('usuarios.edit', $usuario->id) }}"
                   class="btn btn-warning">
                    Editar usuario
                </a>
            @endif

            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                Volver
            </a>

        </div>
    </div>
</div>
@endsection
