<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function generateData(Request $request)
    {
        $data = Data::query()->where('resource_id', $request->resource_id)->first();
        if ($data && !empty($data)) {
            $data = new Data();
        }



//        for ($i = 0; $i < (int)$request->count; $i++) {
//
//        }

    }

}
