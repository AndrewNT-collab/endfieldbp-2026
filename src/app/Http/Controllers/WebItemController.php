<?php

namespace App\Http\Controllers;

use App\Models\Item;

class WebItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();

        return view('items.index', compact('items'));
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }
}