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

        // Requerimiento 5: Obtener un proyecto por su id
    public function show(int $id)
    {
        $proyecto = Project::find($id);

        if (!$proyecto) {
            return redirect()->route('projects.index')->with('error', "No existe un proyecto con id {$id}.");
        }

        return view('projects.show', ['proyecto' => $proyecto]);
    }
}
