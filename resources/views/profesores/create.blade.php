
@extends('layouts.adminlte')

@section('title', 'Registrar Profesor')

@section('content')
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Registrar Profesor</h3>
    </div>

    <form action="{{ route('profesores.store') }}" method="POST">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"
                       value="{{ old('nombre') }}" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control"
                       value="{{ old('apellido') }}" required>
                @error('apellido')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@endsection
