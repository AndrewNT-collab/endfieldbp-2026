<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blueprint;

class BlueprintApiController extends Controller
{
    public function index()
    {
        return Blueprint::with([
            'materials.item',
            'machines',
            'resultItem'
        ])->get();
    }
}