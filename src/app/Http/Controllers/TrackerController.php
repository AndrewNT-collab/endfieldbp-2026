<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blueprint;

class TrackerController extends Controller
{
    public function index(Request $request)
    {
        $query = Blueprint::with([
            'resultItem',
            'machines',
            'area'
        ]);

        if ($request->sort == 'time') {
            $query->orderBy('craft_time');
        }

        $blueprints = $query->get();

        if ($request->sort == 'name') {
            $blueprints = $blueprints->sortBy(
                fn($bp) => $bp->resultItem->name
            );
        }

        return view(
            'tracker.index',
            compact('blueprints')
        );
    }
}