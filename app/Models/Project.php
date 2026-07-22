<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

/**
 * Modelo Project.
 * No extiende de Eloquent Model porque el requerimiento pide datos
 * estáticos (sin base de datos): el set de datos inicial vive
 * directamente en el código (método seed()).
 *
 * Decisión de diseño: para que el CRUD (agregar/editar/eliminar) se
 * pueda demostrar funcionando en pantalla entre distintas peticiones,
 * ese set estático se copia una sola vez a la sesión del usuario y
 * desde ahí se lee/escribe. No se usa base de datos en ningún momento.
 */
class Project
{
    private const SESSION_KEY = 'proyectos';

    // Datos estáticos iniciales (hardcodeados), tal como pide el requerimiento
    private static function seed(): array
    {
        return [
            1 => [
                'id' => 1,
                'nombre' => 'Sistema de Inventario',
                'fecha_inicio' => '2026-01-15',
                'estado' => 'En curso',
                'responsable' => 'María Pérez',
                'monto' => 4500000,
            ],
            2 => [
                'id' => 2,
                'nombre' => 'Portal de Clientes',
                'fecha_inicio' => '2026-03-01',
                'estado' => 'Planificado',
                'responsable' => 'Juan Soto',
                'monto' => 3200000,
            ],
        ];
    }

    // Devuelve los proyectos actuales, inicializando la sesión la primera vez
    private static function todos(): array
    {
        if (!Session::has(self::SESSION_KEY)) {
            Session::put(self::SESSION_KEY, self::seed());
        }

        return Session::get(self::SESSION_KEY);
    }

    // Requerimiento 1: Listar todos los proyectos
    public static function all(): array
    {
        return self::todos();
    }

    // Requerimiento 5: Obtener un proyecto por su id
    public static function find(int $id): ?array
    {
        return self::todos()[$id] ?? null;
    }

    // Requerimiento 2: Agrega un proyecto nuevo
    public static function create(array $data): array
    {
        $proyectos = self::todos();
        $id = empty($proyectos) ? 1 : max(array_keys($proyectos)) + 1;
        $data['id'] = $id;
        $proyectos[$id] = $data;

        Session::put(self::SESSION_KEY, $proyectos);

        return $data;
    }

    // Requerimiento 4: Actualiza un proyecto existente por su id
    public static function update(int $id, array $data): ?array
    {
        $proyectos = self::todos();

        if (!isset($proyectos[$id])) {
            return null;
        }

        $proyectos[$id] = array_merge($proyectos[$id], $data);

        Session::put(self::SESSION_KEY, $proyectos);

        return $proyectos[$id];
    }
}