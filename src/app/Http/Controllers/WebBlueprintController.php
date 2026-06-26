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
        $blueprints = Blueprint::with(['resultItem', 'machines', 'materials.item'])->get();

        return view('blueprints.index', compact('blueprints'));
    }

    public function show(Blueprint $blueprint)
    {
        $blueprint->load(['resultItem', 'machines', 'materials.item']);

        return view('blueprints.show', compact('blueprint'));
    }

    public function create(Area $area)
    {
        $craftableItems = Item::whereIn('category', [
            'processed_material',
            'final_product'
        ])
        ->orderBy('name')
        ->get();

        $materialItems = Item::whereIn('category', [
            'raw_material',
            'processed_material'
        ])
        ->orderBy('name')
        ->get();

        $machines = Machine::orderBy('name')->get();

        return view('blueprints.create', compact(
            'area',
            'craftableItems',
            'materialItems',
            'machines'
        ));
    }

    public function store(Request $request, Area $area)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'result_item_id' => 'nullable|exists:items,id',
            'machines' => 'nullable|array',
            'machines.*' => 'exists:machines,id',
            'craft_time' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
            'materials' => 'nullable|array',
            'materials.*.item_id' => 'nullable|exists:items,id',
            'materials.*.amount' => 'nullable|integer|min:1',
        ]);

        $blueprint = Blueprint::create([
            'area_id' => $area->id,
            'name' => $validated['name'],
            'result_item_id' => $validated['result_item_id'] ?? null,
            'craft_time' => $validated['craft_time'] ?? null,
            'notes' => $validated['notes'] ?? null,
        ]);

        foreach (($validated['materials'] ?? []) as $material) {
            if (!empty($material['item_id'])) {
                $blueprint->materials()->create([
                    'item_id' => $material['item_id'],
                    'amount' => $material['amount'] ?? 1,
                ]);
            }
        }
        
        if (!empty($validated['machines'])) {
            $blueprint->machines()->sync($validated['machines']);
        }

        return redirect()
            ->route('areas.show', $area->slug)
            ->with('success', 'Blueprint added successfully.');
    }
}