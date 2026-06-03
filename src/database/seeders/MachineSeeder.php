<?php

namespace Database\Seeders;

use App\Models\Machine;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    public function run(): void
    {
        Machine::create([
            'name' => 'Smelter',
            'description' => 'Processes ore into ingots.',
        ]);
    }
}