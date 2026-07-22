@extends('layouts.app')

@section('contenido')


{{-- Formulario para editar un proyecto existente (requerimiento 4) --}}

<h1>Editar proyecto #{{ $proyecto['id'] }}</h1>

<form action="{{ route('projects.update', $proyecto['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ $proyecto['nombre'] }}"><br><br>

    <label>Fecha de inicio:</label><br>
    <input type="date" name="fecha_inicio" value="{{ $proyecto['fecha_inicio'] }}"><br><br>

    <label>Estado:</label><br>
    <select name="estado">
        <option value="Planificado" @selected($proyecto['estado'] == 'Planificado')>Planificado</option>
        <option value="En curso" @selected($proyecto['estado'] == 'En curso')>En curso</option>
        <option value="Finalizado" @selected($proyecto['estado'] == 'Finalizado')>Finalizado</option>
    </select><br><br>

    <label>Responsable:</label><br>
    <input type="text" name="responsable" value="{{ $proyecto['responsable'] }}"><br><br>

    <label>Monto:</label><br>
    <input type="number" name="monto" value="{{ $proyecto['monto'] }}"><br><br>

    <button type="submit">Actualizar proyecto</button>
</form>

<p><a href="{{ route('projects.index') }}">Cancelar y volver al listado</a></p>

@endsection