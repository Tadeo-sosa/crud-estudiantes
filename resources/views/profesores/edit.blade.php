
@extends('layouts.adminlte')

@section('title', 'Editar Profesor')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Profesor</h3>
    </div>

    <form action="{{ route('profesores.update', $profesore) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"
                       value="{{ old('nombre', $profesore->nombre) }}" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control"
                       value="{{ old('apellido', $profesore->apellido) }}" required>
                @error('apellido')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@endsection
