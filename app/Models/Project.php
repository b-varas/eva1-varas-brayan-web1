<?php

namespace App\Models;

class Project
{
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

        public static function all(): array
    {
        return self::$proyectos;
    }
}
