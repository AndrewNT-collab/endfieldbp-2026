<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:raw_material,processed_material,final_product',
            'source' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $item = Item::create($validated);

        return response()->json([
            'message' => 'Item berhasil dibuat',
            'data' => $item
        ], 201);
    }

    public function show(Item $item)
    {
        return response()->json($item);
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'sometimes|required|in:raw_material,processed_material,final_product',
            'source' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $item->update($validated);

        return response()->json([
            'message' => 'Item berhasil diupdate',
            'data' => $item
        ]);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json([
            'message' => 'Item berhasil dihapus'
        ]);
    }
}