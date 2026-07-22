<?php

namespace App\Http\Controllers;
/**
 * Controlador encargado de gestionar los proyectos.
 * Conecta las rutas con el modelo Project y con las vistas.
 */
use App\Models\Project;
use Illuminate\Http\Request;



class ProjectController extends Controller
{
    /**
     * Requerimiento 1: Listar todos los proyectos.
     * Pide los datos al modelo y se los entrega a la vista.
     */
        public function index()
    {
        $proyectos = Project::all();

        return view('projects.index', ['proyectos' => $proyectos]);
    }
}
