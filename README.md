# Sistema de Gestión de Proyectos — Tech Solutions Group

Evaluación sumativa Unidad 1 — Framework Web (Laravel 11 / PHP 8.3)

Aplicación web para la gestión de proyectos de Tech Solutions, desarrollada como caso de estudio para practicar los conceptos fundamentales de un framework MVC: rutas, controladores, modelos, vistas y componentes reutilizables.

## Contenido

- [Descripción](#descripción)
- [Tecnologías](#tecnologías)
- [Instalación](#instalación)
- [Rutas disponibles](#rutas-disponibles)
- [Arquitectura (MVC)](#arquitectura-mvc)
- [Patrones de diseño utilizados](#patrones-de-diseño-utilizados)
- [Componente reutilizable: Valor UF del día](#componente-reutilizable-valor-uf-del-día)
- [Estándares de desarrollo web aplicados](#estándares-de-desarrollo-web-aplicados)

## Descripción

La aplicación permite administrar proyectos (listar, ver, crear, actualizar y eliminar), cumpliendo los siguientes requerimientos:

- CRUD completo de proyectos (id, nombre, fecha de inicio, estado, responsable, monto).
- Datos estáticos (sin base de datos), definidos directamente en el modelo.
- Vistas con estilos básicos y mensajes de confirmación tipo pop-up.
- Componente reutilizable que consume un servicio externo (API de indicadores económicos) para mostrar el valor de la UF del día, con respaldo simulado si el servicio no está disponible.

## Tecnologías

- PHP 8.3
- Laravel 11
- Blade (motor de plantillas)
- JavaScript básico (pop-ups de notificación)
- CSS propio (sin frameworks externos)

## Instalación

```bash
git clone <url-del-repositorio>
cd eva1-varas-brayan-web1
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Luego visita `http://127.0.0.1:8000/proyectos`.

> No requiere configurar base de datos: los datos son estáticos y se manejan en sesión.

## Rutas disponibles

| Acción | Verbo | Ruta | Nombre | Controlador |
|---|---|---|---|---|
| Listar proyectos | GET | `/proyectos` | `projects.index` | `index` |
| Formulario crear | GET | `/proyectos/crear` | `projects.create` | `create` |
| Guardar proyecto | POST | `/proyectos` | `projects.store` | `store` |
| Formulario editar | GET | `/proyectos/{id}/editar` | `projects.edit` | `edit` |
| Actualizar proyecto | PUT | `/proyectos/{id}` | `projects.update` | `update` |
| Confirmar eliminación | GET | `/proyectos/{id}/eliminar` | `projects.confirmDelete` | `confirmDelete` |
| Eliminar proyecto | DELETE | `/proyectos/{id}` | `projects.destroy` | `destroy` |
| Obtener proyecto por id | GET | `/proyectos/{id}` | `projects.show` | `show` |

Las rutas con parámetro `{id}` están restringidas con `whereNumber()` para aceptar solo valores numéricos, evitando errores por parámetros inválidos.

## Arquitectura (MVC)

- **Modelo (`app/Models/Project.php`)**: contiene los datos estáticos iniciales (hardcodeados) y expone métodos (`all`, `find`, `create`, `update`, `delete`) para manipularlos. No usa Eloquent ni base de datos. Para que el CRUD sea demostrable entre distintas peticiones HTTP, el set estático se copia una única vez a la sesión del usuario y desde ahí se lee/escribe.
- **Controlador (`app/Http/Controllers/ProjectController.php`)**: recibe las peticiones HTTP, valida los datos de entrada y coordina la comunicación entre el modelo y las vistas.
- **Vistas (`resources/views/projects/*.blade.php`)**: se encargan exclusivamente de la presentación, heredando una estructura común desde `layouts/app.blade.php`.

## Patrones de diseño utilizados

| Patrón | Dónde se aplica |
|---|---|
| MVC (Model-View-Controller) | Estructura general del proyecto |
| Front Controller / Router | `routes/web.php` distribuye cada petición al controlador correspondiente |
| Inyección de dependencias | `UfWidget` recibe `UfService` automáticamente vía el constructor |
| Service Layer | `UfService` aísla la lógica de consumo de la API externa |
| Component Pattern | `<x-uf-widget />`, componente Blade reutilizable en todas las vistas |
| Template Method | `layouts/app.blade.php` con `@yield`, completado por cada vista hija |

## Componente reutilizable: Valor UF del día

`app/Services/UfService.php` consulta la API pública `mindicador.cl`. Si el servicio no responde (sin conexión, timeout, error del servidor), se entrega automáticamente un valor simulado, evitando que la aplicación falle.

`app/View/Components/UfWidget.php` expone este servicio como componente Blade:

```blade
<x-uf-widget />
```

Se incluye una única vez en el layout compartido, por lo que aparece en todas las vistas del módulo sin duplicar código.

## Estándares de desarrollo web aplicados

- Verbos HTTP semánticos (GET, POST, PUT, DELETE) mediante `@method()` en los formularios.
- Protección CSRF (`@csrf`) en todos los formularios.
- Validación server-side (`$request->validate()`).
- Rutas nombradas (`route()`) en lugar de URLs escritas manualmente.
- Separación de responsabilidades entre modelo, controlador, vista y servicio.
- Mensajes de retroalimentación al usuario (éxito / error) mediante flash messages y notificaciones tipo pop-up.

---

Desarrollado por Brayan Varas — Evaluación Sumativa Unidad 1, Desarrollo Web con Framework.
