
{{-- Vista que muestra la tabla con todos los proyectos (requerimiento 1) --}}
<h1>Listado de proyectos</h1>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha inicio</th>
            <th>Estado</th>
            <th>Responsable</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        {{-- Recorre cada proyecto del array y genera una fila por cada uno --}}
        @foreach ($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto['id'] }}</td>
                <td>{{ $proyecto['nombre'] }}</td>
                <td>{{ $proyecto['fecha_inicio'] }}</td>
                <td>{{ $proyecto['estado'] }}</td>
                <td>{{ $proyecto['responsable'] }}</td>
                <td>{{ $proyecto['monto'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>