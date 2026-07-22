<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

// Requerimiento 1: Listar todos los proyectos
Route::get('/proyectos', [ProjectController::class, 'index'])->name('projects.index');

// Requerimiento 2 (parte 1): Muestra el formulario vacío para crear un proyecto
Route::get('/proyectos/crear', [ProjectController::class, 'create'])->name('projects.create');

// Requerimiento 2 (parte 2): Procesa el formulario y guarda el proyecto nuevo
Route::post('/proyectos', [ProjectController::class, 'store'])->name('projects.store');

// Requerimiento 4 (parte 1): Muestra el formulario con los datos del proyecto a editar   ← NUEVA
Route::get('/proyectos/{id}/editar', [ProjectController::class, 'edit'])->whereNumber('id')->name('projects.edit');

// Requerimiento 3 (parte 1): Muestra la confirmación antes de eliminar
Route::get('/proyectos/{id}/eliminar', [ProjectController::class, 'confirmDelete'])->whereNumber('id')->name('projects.confirmDelete');

// Requerimiento 3 (parte 2): Elimina el proyecto por su id
Route::delete('/proyectos/{id}', [ProjectController::class, 'destroy'])->whereNumber('id')->name('projects.destroy');

// Requerimiento 4 (parte 2): Procesa el formulario y actualiza el proyecto               ← NUEVA
Route::put('/proyectos/{id}', [ProjectController::class, 'update'])->whereNumber('id')->name('projects.update');

// Requerimiento 5: Obtener un proyecto por su id
Route::get('/proyectos/{id}', [ProjectController::class, 'show'])->name('projects.show');