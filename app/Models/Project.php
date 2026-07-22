<?php

namespace App\Models;
/**
 * Modelo Project.
 * No extiende de Eloquent Model porque el requerimiento pide
 * datos estáticos (sin base de datos): los proyectos viven
 * directamente en un array dentro de esta clase.
 */

class Project
{   // Datos estáticos iniciales de los proyectos (clave = id del proyecto)
    private static array $proyectos = [
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
        // Devuelve todos los proyectos (requerimiento: listar todos los proyectos)
        public static function all(): array
    {
        return self::$proyectos;
    }
}
