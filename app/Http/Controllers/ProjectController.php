<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
        public function index()
    {
        $proyectos = Project::all();

        return view('projects.index', ['proyectos' => $proyectos]);
    }
}
