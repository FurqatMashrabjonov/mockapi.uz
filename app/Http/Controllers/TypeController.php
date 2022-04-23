<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function get(){
        $types = Type::query()->select('id', 'name')->get();
        return response()->json($types);
    }
}
