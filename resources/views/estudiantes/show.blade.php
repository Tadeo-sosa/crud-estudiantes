
@extends('layouts.adminlte')

@section('title', 'Detalle del Estudiante')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-8">

            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i>
                        Información del estudiante
                    </h3>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Nombre:</label>
                        <p>{{ $estudiante->nombre }}</p>
                    </div>

                    <div class="form-group">
                        <label>Apellido:</label>
                        <p>{{ $estudiante->apellido }}</p>
                    </div>

                    <div class="form-group">
                        <label>DNI:</label>
                        <p>{{ $estudiante->dni }}</p>
                    </div>

                    <div class="form-group">
                        <label>Fecha de nacimiento:</label>
                        <p>{{ $estudiante->fecha_nacimiento }}</p>
                    </div>

                    <div class="form-group">
                        <label>Profesor:</label>
                        <p>
                            {{ $estudiante->profesor->nombre ?? 'Sin profesor' }}
                            {{ $estudiante->profesor->apellido ?? '' }}
                        </p>
                    </div>

                    <div class="form-group">
                        <label>Foto de perfil:</label>

                        @if($estudiante->foto_perfil)
                            <div>
                                <img
                                    src="{{ asset('storage/'.$estudiante->foto_perfil) }}"
                                    alt="Foto del estudiante"
                                    class="img-thumbnail"
                                    style="max-width: 180px;">
                            </div>
                        @else
                            <p>No hay fotografía disponible.</p>
                        @endif

                    </div>

                </div>

                <div class="card-footer">

                    <a href="{{ route('estudiantes.index') }}"
                       class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Volver al listado
                    </a>

                    <a href="{{ route('estudiantes.edit', $estudiante) }}"
                       class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                        Editar estudiante
                    </a>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
