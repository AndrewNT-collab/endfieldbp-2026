<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Blueprint;
use App\Models\Item;
use App\Models\Machine;
use Illuminate\Http\Request;

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

    public function create(Area $area)
    {
        $items = Item::orderBy('name')->get();
        $machines = Machine::orderBy('name')->get();

        return view('blueprints.create', compact('area', 'items', 'machines'));
    }

    public function store(Request $request, Area $area)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'result_item_id' => 'nullable|exists:items,id',
            'machine_id' => 'nullable|exists:machines,id',
            'craft_time' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
        ]);

        $validated['area_id'] = $area->id;

        Blueprint::create($validated);

        return redirect()
            ->route('areas.show', $area->slug)
            ->with('success', 'Blueprint added successfully.');
    }
}