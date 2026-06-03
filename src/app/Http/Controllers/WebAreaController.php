<?php

namespace App\Http\Controllers;

use App\Models\Area;

class WebAreaController extends Controller
{
    public function show(Area $area)
    {
        $area->load(['blueprints.resultItem', 'blueprints.machine']);

        return view('areas.show', compact('area'));
    }
}