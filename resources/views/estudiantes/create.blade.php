
@extends('layouts.adminlte')

@section('title', 'Nuevo Estudiante')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-8">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-plus"></i>
                        Registrar nuevo estudiante
                    </h3>
                </div>

                <form method="POST"
                      action="{{ route('estudiantes.store') }}"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text"
                                   name="nombre"
                                   id="nombre"
                                   class="form-control"
                                   placeholder="Ingrese el nombre"
                                   value="{{ old('nombre') }}">
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text"
                                   name="apellido"
                                   id="apellido"
                                   class="form-control"
                                   placeholder="Ingrese el apellido"
                                   value="{{ old('apellido') }}">
                        </div>

                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text"
                                   name="dni"
                                   id="dni"
                                   class="form-control"
                                   placeholder="Ingrese el DNI"
                                   value="{{ old('dni') }}">
                        </div>

                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date"
                                   name="fecha_nacimiento"
                                   id="fecha_nacimiento"
                                   class="form-control"
                                   value="{{ old('fecha_nacimiento') }}">
                        </div>

                        <div class="form-group">
                            <label for="foto_perfil">Foto de perfil</label>
                            <div class="custom-file">
                                <input type="file"
                                       name="foto_perfil"
                                       id="foto_perfil"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profesor_id">Profesor</label>

                            <select name="profesor_id"
                                    id="profesor_id"
                                    class="form-control">

                                <option value="">Seleccione un profesor</option>

                                @foreach($profesores as $profesor)
                                    <option value="{{ $profesor->id }}"
                                        {{ old('profesor_id') == $profesor->id ? 'selected' : '' }}>
                                        {{ $profesor->nombre }} {{ $profesor->apellido }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Guardar estudiante
                        </button>

                        <a href="{{ route('estudiantes.index') }}"
                           class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Volver
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection
