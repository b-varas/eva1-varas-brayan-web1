@extends('layouts.app')

@section('contenido')


<h1>Listado de proyectos</h1>

<p>
    
    <a href="{{ route('projects.create') }}">Agregar proyecto</a>
</p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha inicio</th>
            <th>Estado</th>
            <th>Responsable</th>
            <th>Monto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($proyectos as $proyecto)
        <tr>
            <td>{{ $proyecto['id'] }}</td>
            <td>{{ $proyecto['nombre'] }}</td>
            <td>{{ $proyecto['fecha_inicio'] }}</td>
            <td>{{ $proyecto['estado'] }}</td>
            <td>{{ $proyecto['responsable'] }}</td>
            <td>{{ $proyecto['monto'] }}</td>
            <td>
                <a href="{{ route('projects.show', $proyecto['id']) }}">Ver</a>
                |
                <a href="{{ route('projects.edit', $proyecto['id']) }}">Editar</a>
                |
                <a href="{{ route('projects.confirmDelete', $proyecto['id']) }}">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection