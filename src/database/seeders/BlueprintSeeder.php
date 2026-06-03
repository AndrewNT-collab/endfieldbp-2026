<?php

namespace Database\Seeders;

use App\Models\Blueprint;
use App\Models\Item;
use App\Models\Machine;
use Illuminate\Database\Seeder;

class BlueprintSeeder extends Seeder
{
    public function run(): void
    {
        $ironIngot = Item::where('name', 'Iron Ingot')->first();
        $smelter = Machine::where('name', 'Smelter')->first();

        Blueprint::create([
            'area_id' => null,
            'name' => 'Iron Ingot Production',
            'image' => null,
            'notes' => 'Turns Iron Ore into Iron Ingot.',
            'result_item_id' => $ironIngot?->id,
            'machine_id' => $smelter?->id,
            'craft_time' => 5,
        ]);
    }
}