<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::create([
            'name' => 'Iron Ore',
            'description' => 'Basic raw material.',
        ]);

        Item::create([
            'name' => 'Iron Ingot',
            'description' => 'Processed iron material.',
        ]);
    }
}