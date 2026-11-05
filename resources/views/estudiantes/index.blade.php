@extends('layouts.adminlte')

@section('title', 'Listado de Estudiantes')

@section('content')

<h1>Lista de estudiantes</h1>
@if(auth()->user()->esAdmin())
<a href="{{ route('estudiantes.create') }}" class="btn btn-success mb-3">
    <i class="fas fa-plus"></i> Nuevo Estudiante
</a>
@endif
<style>
    table { 
        font-family: 'Poppins', sans-serif;
        border-collapse: collapse;
        width: 100%;
    }


    td {
        padding: 8px;
        text-align: center;
    }
</style>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Lista de Estudiantes
        </h3>
    </div>

    <div class="card-body">
<table id="tablaEstudiantes" border="1">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>DNI</th>
        <th>Foto</th>
        <th>Acciones</th>
        <th>Profesor</th>
    </tr>

    @foreach($estudiantes as $e)
    <tr>
        <td>{{ $e->nombre }}</td>
        <td>{{ $e->apellido }}</td>
        <td>{{ $e->dni }}</td>
        <td>
            @if($e->foto_perfil)
                <img src="{{ asset('storage/'.$e->foto_perfil) }}" width="50">
            @endif
        </td>

        <td>
            {{ $e->profesor->nombre ?? 'Sin profesor' }}
        
        </td>
        
        <td>
    {{-- Este botón lo pueden ver ambos roles --}}
    <a href="{{ route('estudiantes.show',$e) }}" class="btn btn-info btn-sm">
        Ver
    </a>

    {{-- Estos botones solamente los puede ver el administrador --}}
    @if(auth()->user()->esAdmin())

        <a href="{{ route('estudiantes.edit',$e) }}" class="btn btn-warning btn-sm">
            Editar
        </a>

        <form action="{{ route('estudiantes.destroy', $e) }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </form>

    @endif
</td>
    </tr>
    @endforeach
</table>
</div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {

    $('#tablaEstudiantes').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        }
    });

});
</script>
@endpush