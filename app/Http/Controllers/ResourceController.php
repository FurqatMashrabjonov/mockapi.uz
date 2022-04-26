<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function store(Request $request)
    {
        $resource = new Resource();
        $resource->name = $request->name;
        $resource->project_id = $request->project_id;
        $resource->save();

        $fields = $request->fields;

        foreach ($fields as $field) {
            $resource->fields()->create([
                'name' => $field['name'],
                'type_id' => $field['type_id'],
            ]);
        }

        return response()->json($resource->load('fields'));
    }
}
