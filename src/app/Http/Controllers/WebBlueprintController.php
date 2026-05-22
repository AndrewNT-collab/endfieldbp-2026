<?php

namespace App\Http\Controllers;

use App\Models\Blueprint;

class WebBlueprintController extends Controller
{
    public function index()
    {
        $blueprints = Blueprint::with(['resultItem', 'machine', 'materials.item'])->get();

        return view('blueprints.index', compact('blueprints'));
    }

    public function show(Blueprint $blueprint)
    {
        $blueprint->load(['resultItem', 'machine', 'materials.item']);

        return view('blueprints.show', compact('blueprint'));
    }
}