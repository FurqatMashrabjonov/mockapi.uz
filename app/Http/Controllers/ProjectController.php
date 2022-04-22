<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function get()
    {
        $project = Project::query()
            ->where('user_id', auth()->user()->getAuthIdentifier())->get();

        return response()->json($project->toArray());
    }

    public function getSingle(Project $project)
    {
        return response()->json($project->load('resources')->toArray());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'prefix' => ['required', 'string', 'max:15']
        ]);

        $project = new Project();
        $project->fill($request->only(['name', 'prefix']));
        $project->token = Str::random(24);
        $project->user_id = auth()->user()->getAuthIdentifier();

        if ($project->save())
            return response()->json($project->toArray());
        else
            return response()->json(['status' => 500, 'error' => 'Loyiha saqlanmadi']);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'prefix' => ['required', 'string', 'max:15']
        ]);

        $project->fill($request->only(['name', 'prefix']));

        if ($project->save())
            return response()->json($project->toArray());
        else
            return response()->json(['status' => 500, 'error' => 'Loyiha saqlanmadi']);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['status' => 200, 'message' => 'Loyiha o\'chirildi']);
    }

}
