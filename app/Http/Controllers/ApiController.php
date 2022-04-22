<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Resource;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public $token = 'furqat';

    public function get($prefix, $resource): \Illuminate\Http\JsonResponse
    {
        $project = Project::query()
            ->where('token', $this->token)
            ->where('prefix', $prefix)
            ->first();

        if (!$project && empty($project)) {
            return response()->json([
                'error' => 'Project not found',
            ], 404);
        }


        $resource = Resource::query()
            ->where('project_id', $project->id)
            ->where('name', $resource)
            ->first();

        if (!$resource && empty($resource)) {
            return response()->json([
                'error' => 'Resource not found',
            ], 404);
        }

        $data = $resource->load('many_data');

        $res = [];
        foreach ($data->many_data as $item) {
            $res[] = json_decode($item->data);
        }
        return response()->json($res);
    }



}
