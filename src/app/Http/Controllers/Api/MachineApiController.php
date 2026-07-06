<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Machine;

class MachineApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Machine::all()
        );
    }
}