<?php

namespace App\Http\Controllers;

use App\Models\Blueprint;
use Illuminate\Http\Request;

class WebTrackerController extends Controller
{
    public function index(Request $request)
    {
        $query = Blueprint::with([
            'resultItem',
            'machines',
            'area'
        ]);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('resultItem', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('area')) {
            $area = $request->area;

            $query->whereHas('area', function ($q) use ($area) {
                $q->where('name', $area);
            });
        }

        if ($request->sort == 'time') {
            $query->orderBy('craft_time');
        }

        $blueprints = $query->get();

        if ($request->sort == 'name') {
            $blueprints = $blueprints->sortBy(
                fn ($bp) => $bp->resultItem->name
            );
        }

        return view(
            'tracker.index',
            compact('blueprints')
        );
    }
}