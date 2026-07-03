<?php

namespace App\Http\Controllers;

use App\Models\Item;

class WebItemController extends Controller
{
    public function index()
    {
        $items = Item::with([
            'producedBy.materials.item',
            'producedBy.machines',
        ])
        ->orderBy('name')
        ->get();

        return view(
            'items.index',
            compact('items')
        );
    }

    public function show(Item $item)
    {
        $item->load([
            'producedBy.materials.item',
            'producedBy.machines',
        ]);

        return view(
            'items.show',
            compact('item')
        );
    }
}