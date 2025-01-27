<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all()->where('user_id', auth()->id());

        return view('projects.index', compact('projects'));
    }

    public function indexAdmin()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = 'Sin cambiar';
        $validated['user_id'] = auth()->id();
        $project = Project::create($validated);

        return redirect()->route('projects.index', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();
        $validated['status'] = 'Cambiada';
        $project->update($validated);

        return redirect()->route('projects.index', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index', compact('project'));
    }

    public function varsDashboard()
    {
        $projectsWithoutChange = Project::all()->where('user_id', auth()->id())->where('status', 'Sin cambiar');

        $countProjects = Project::where('user_id', auth()->id())
        ->where('status', 'sin cambiar')
        ->count();

        $countProjectsTotal = Project::where('user_id', auth()->id())->count();

        Carbon::setLocale('es');
        $nameMonth = Carbon::now()->translatedFormat('F');

        if($nameMonth == 'febrero' || $nameMonth == 'marzo' || $nameMonth == 'abril')
        {
            if($nameMonth == 'abril')
            {
                $nameMonth = "Mes actual";
            }
            else
            {
                $nameMonth = 'Abril';
            }
            
        }
        elseif($nameMonth == 'mayo' || $nameMonth == 'junio' || $nameMonth == 'julio')
        {
            if($nameMonth == 'julio')
            {
                $nameMonth = "Mes actual";
            }
            else
            {
                $nameMonth = 'Julio';
            }
        }
        elseif($nameMonth == 'agosto' || $nameMonth == 'septiembre' || $nameMonth == 'octubre')
        {
            if($nameMonth == 'octubre')
            {
                $nameMonth = "Mes actual";
            }
            else
            {
                $nameMonth = 'Octubre';
            }
        }
        else 
        {
            if($nameMonth == 'enero')
            {
                $nameMonth = "Mes actual";
            }
            else
            {
                $nameMonth = 'Enero';
            }
        }
        
        return view('dashboard', compact('countProjects', 'countProjectsTotal', 'nameMonth', 'projectsWithoutChange'));
    }
}
