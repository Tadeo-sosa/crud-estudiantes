@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestión de usuarios</h1>

        @if(auth()->user()->esAdmin())
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
                Nuevo usuario
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @if($usuario->role === 'admin')
                                        <span class="badge bg-primary">Administrador</span>
                                    @else
                                        <span class="badge bg-secondary">Empleado</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('usuarios.show', $usuario->id) }}"
                                       class="btn btn-info btn-sm">
                                        Ver
                                    </a>

                                    @if(auth()->user()->esAdmin())
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                           class="btn btn-warning btn-sm">
                                            Editar
                                        </a>

                                        @if($usuario->id !== auth()->id())
                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Eliminar
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No hay usuarios registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $usuarios->links() }}

        </div>
    </div>
</div>
@endsection
