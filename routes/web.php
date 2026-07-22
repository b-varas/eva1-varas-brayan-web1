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
Route::get('/proyectos/{id}/editar', [ProjectController::class, 'edit'])->name('projects.edit');

// Requerimiento 4 (parte 2): Procesa el formulario y actualiza el proyecto               ← NUEVA
Route::put('/proyectos/{id}', [ProjectController::class, 'update'])->name('projects.update');

// Requerimiento 5: Obtener un proyecto por su id
Route::get('/proyectos/{id}', [ProjectController::class, 'show'])->name('projects.show');