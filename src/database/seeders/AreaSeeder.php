<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        Area::firstOrCreate(
            ['slug' => 'valley-iv'],
            [
                'name' => 'Valley IV',
                'description' => null,
            ]
        );

        Area::firstOrCreate(
            ['slug' => 'sub-pac-valley-iv'],
            [
                'name' => 'Sub PAC - Valley IV',
                'description' => null,
            ]
        );

        Area::firstOrCreate(
            ['slug' => 'wuling'],
            [
                'name' => 'Wuling',
                'description' => null,
            ]
        );

        Area::firstOrCreate(
            ['slug' => 'sub-pac-wuling'],
            [
                'name' => 'Sub PAC - Wuling',
                'description' => null,
            ]
        );
    }
}