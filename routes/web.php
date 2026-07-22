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

// Requerimiento 5: Obtener un proyecto por su id
Route::get('/proyectos/{id}', [ProjectController::class, 'show'])->name('projects.show');