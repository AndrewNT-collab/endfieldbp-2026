<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;

class ItemApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Item::with([
                'producedBy.materials.item',
                'producedBy.machines'
            ])->get()
        );
    }

    public function show(Item $item)
    {
        return response()->json(
            $item->load([
                'producedBy.materials.item',
                'producedBy.machines'
            ])
        );
    }
}