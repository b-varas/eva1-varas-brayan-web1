<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

// Requerimiento 1: Listar todos los proyectos
Route::get('/proyectos', [ProjectController::class, 'index'])->name('projects.index');