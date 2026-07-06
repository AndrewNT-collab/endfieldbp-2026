<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;

class AreaApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Area::with('blueprints')->get()
        );
    }
}