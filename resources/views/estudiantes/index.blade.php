<h1>Lista de estudiantes</h1>

<a href="{{ route('estudiantes.create') }}">Nuevo</a>
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
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>DNI</th>
        <th>Foto</th>
        <th>Acciones</th>
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
            <a href="{{ route('estudiantes.edit', $e) }}">Editar</a>

            <form action="{{ route('estudiantes.destroy', $e) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>